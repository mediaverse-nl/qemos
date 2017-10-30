<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreIngredient;
use App\Ingredient;
use Validator;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    protected $ingredient;

    public function __construct()
    {
        $this->ingredient = new Ingredient();
        $this->ingredient = $this->ingredient->where('location_id', '=', $this->location());
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
        return view('staff.ingredient.index')->with('ingredients', $this->ingredient->get());
    }

    public function ingredients()
    {
        return response()->json($this->ingredient->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredient $request)
    {
        $ingredient = new Ingredient();

        $ingredient->ingredient = $request->ingredient;
        $ingredient->location_id = $this->location();

        $ingredient->save();

        return response()->json($ingredient, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient = $this->ingredient->find($id);

        return response()->json($ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIngredient $request, $id)
    {
        $ingredient = $this->ingredient->findOrFail($id);

        $ingredient->ingredient = $request->ingredient;

        $ingredient->save();

        return response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = $this->ingredient->destroy($id);

        return response()->json($ingredient);
    }
}
