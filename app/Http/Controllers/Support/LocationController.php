<?php

namespace App\Http\Controllers\Support;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    protected $location;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('support.location.index')->with('locations', $this->location->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('support.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = $this->location;

        $location->adres = $request->adres;
        $location->postcode = $request->postcode;
        $location->stad = $request->stad;
        $location->btw = $request->btw;
        $location->lang = $request->lang;
        $location->kvk = $request->kvk;
        $location->status = $request->status;
//
//        if ($request->hasFile('image')){
//            $file = $request->file('image');
//            $ext = $file->getClientOriginalExtension();
//            $file->move('images/blog/', $file->getFilename().'.'.$ext);
//            $blog->image = $file->getFilename().'.'.$ext;
//        }
        $location->save();

        return redirect()->route('support.location.edit', $location->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('support.location.edit')->with('location', $this->location->findOrFail($id));
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
        //
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
