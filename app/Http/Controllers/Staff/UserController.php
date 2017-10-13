<?php

namespace App\Http\Controllers\Staff;

use App\Http\Requests\StaffUserStore;
use App\Mail\UserInvation;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Validator;
//use Session;

class UserController extends Controller
{
    protected $user;

    protected $role;

    public function __construct()
    {
        $this->role = new Role();

        $this->user = new User();
        $this->user = $this->user->whereHas('UserLocation', function ($q){
            $q->where('location_id', '=', $this->location());
        });
    }

    public function location(){
        return session('location');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('staff.user.index')->with('users', $this->user->get())->with('roles', $this->role->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffUserStore $request)
    {
        $confirmation_code = str_random(30);
        $password = str_random(6);
        $location_id = auth()->user()->currentLocation();

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->confirmation_code = $confirmation_code;

        $user->save();

        $user->userLocation()->create([
            'user_id' => $user->id,
            'location_id' => $location_id,
        ]);

        foreach ($request->roles as $role)
        {
            $user->userRole()->create([
                'user_id' => $user->id,
                'role_id' => $role,
            ]);
        }

        Mail::to($request->email)->send(new UserInvation($user, $password, $confirmation_code));

//        Mail::send('email.verify', $confirmation_code, function($message) {
//            $message->to(Input::get('email'), Input::get('username'))
//                ->subject('Verify your email address');
//        });

        $request->session()->flash('message', 'Thanks for signing up! Please check your email.');
//
//        Flash::message();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'status' => 'required',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $user = $this->user->find($id);

        $user->status = $request->status;

        $user->save();

        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->destroy($id);

        return response()->json($user);
    }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        session()->flash('status', 'You have successfully verified your account.');

        return redirect()->route('login');
    }
}
