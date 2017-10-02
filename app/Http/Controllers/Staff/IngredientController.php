<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

use App\Ingredient;
use Validator;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    protected $ingredient;

    public function __construct()
    {
        $this->ingredient = new Ingredient();
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
    public function store(Request $request)
    {
        $rules = [
            'ingredient' => 'required',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $ingredient = $this->ingredient;

        $ingredient->ingredient = $request->ingredient;

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
    public function update(Request $request, $id)
    {
        $rules = [
            'ingredient' => 'required',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $ingredient = $this->ingredient->find($id);

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
