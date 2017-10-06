<?php

namespace App\Http\Controllers\Staff;

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchLocation(Request $request)
    {
        $this->location->locationSwitch($request);

        return redirect()->back();
    }

}
