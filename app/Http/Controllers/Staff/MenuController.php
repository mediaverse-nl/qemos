<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMenu;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menu;

    public function __construct()
    {
        $this->middleware('auth.role:manager', ['only' => ['store', 'index']]);

        $this->menu = new Menu();
        $this->menu = $this->menu->where('location_id', '=', $this->location());
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
        return view('staff.menu.index')->with('menus', $this->menu->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu $request)
    {
        $menu = new Menu();

        $menu->naam = $request->naam;
        $menu->description = '';
        $menu->status = 'online';
        $menu->location_id = $this->location();

        $menu->save();

        return response()->json($menu, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = $this->menu->findOrFail($id);

        return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMenu $request, $id)
    {
        $menu = $this->menu->findOrFail($id);

        $menu->naam = $request->naam;

        $menu->save();

        return response()->json($menu, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = $this->menu->findOrFail($id);

        $menu->destroy($id);

        return response()->json($menu, 200);
    }
}
