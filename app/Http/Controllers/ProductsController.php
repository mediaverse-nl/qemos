<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Product;
use Illuminate\Validation\Rule;
use Validator;
use Input;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $product;
    protected $ingredient;

    public function __construct()
    {
        $this->product = new Product();
        $this->ingredient = new Ingredient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.product.index')->with('products', $this->product->get())->with('ingredients', $this->ingredient->get());
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
            'naam' => 'required',
            'bereidingsduur' => 'required',
            'status' => 'required',
            'beschrijving' => 'required|string|min:5|max:250',
            'prijs' => 'required|numeric',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $product = $this->product;

        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;

        $product->save();

        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with('productIngredient')->find($id);

        return response()->json($product);
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
            'naam' => 'required',
            'bereidingsduur' => 'required',
            'status' => 'required',
            'beschrijving' => 'required|string|min:5|max:250',
            'prijs' => 'required|numeric',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $task = $this->product->find($id);

        $task->naam = $request->naam;
        $task->bereidingsduur = $request->bereidingsduur;
        $task->prijs = $request->prijs;
        $task->beschrijving = $request->beschrijving;
        $task->status = $request->status;

        $task->save();

        if(!empty($request->ingredients)){
            foreach ($request->ingredients as $ingredient){
                $ingredient->projectRole()->insert([['project_id' => $ingredient->id, 'role_id' => $ingredient,],]);
            }
        }

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = $this->product->destroy($id);

        return response()->json($task);
    }
}
