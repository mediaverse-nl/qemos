<?php

namespace App\Http\Controllers\Support;

use App\Whitelist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WhitelistController extends Controller
{
    protected $whitelist;

    public function __construct()
    {
        $this->whitelist = new Whitelist();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whitelist = $this->whitelist;

        $whitelist->location_id = $request->location;
        $whitelist->ip_address = $request->ip_address;
//        $whitelist->status = $request->status;

        $whitelist->save();

        return redirect()->route('support.location.edit', $whitelist->location->id);
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
        //
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
        $this->whitelist->destroy($id);

        return redirect()->back();

    }
}
