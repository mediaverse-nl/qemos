<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tafel;
use Validator;

class TafelsController extends Controller
{
    protected $tafel;

    public function __construct()
    {
        $this->tafel = new Tafel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.tafel.index')->with('tafels', $this->tafel->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.tafel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aantal_plaatsen' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
//            return response()->json(['data' =>$validator]);
            return redirect()
                ->route('tafel.create')
                ->withErrors($validator)
                ->withInput();
        }

        $tafel = $this->tafel;

        $tafel->aantal_plaatsen = $request->aantal_plaatsen;
        $tafel->status = $request->status;

        $tafel->save();

        return redirect()->route('tafel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('auth.tafel.edit')->with('tafel', $this->tafel->findOrFail($id));
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
        $tafel = $this->tafel->findOrFail($id);

        $tafel->aantal_plaatsen = $request->aantal_plaatsen;
        $tafel->status = $request->status;

        $tafel->save();

        return redirect()->route('tafel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
