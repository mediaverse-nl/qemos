<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Ingredient;
use App\Menu;
use App\Product;
use Illuminate\Validation\Rule;
use Validator;
use Input;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $ingredient;

    public function __construct()
    {
        $this->product = new Product();
        $this->ingredient = new Ingredient();
        $this->menu = new Menu();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.admin.product.index')
            ->with('products', $this->product->get())
            ->with('menu', $this->menu->get())
            ->with('ingredients', $this->ingredient->get());
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
            'menu' => 'required|numeric',
//            'bezonderheden' => '',
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
//        $product->bezonderheden = $request->bezonderheden;

        $product->save();

        $product->menuProduct()->insert(['product_id' => $product->id, 'menu_id' => $request->menu]);

        if(!empty($request->ingredients)){
            foreach ($request->ingredients as $ingredient){
                $product->productIngredient()->insert([['product_id' => $product->id, 'ingredient_id' => $ingredient],]);
            }
        }

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
        $product = $this->product->with('productIngredient')->with('menuProduct')->find($id);

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
//            'bezonderheden' => '',
            'menu' => 'required|numeric',
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 422); // 400 being the HTTP code for an invalid request.
        }

        $product = $this->product->find($id);

        $product->naam = $request->naam;
        $product->bereidingsduur = $request->bereidingsduur;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;

//        if ($request->bezonderheden != 0)
            $product->bezonderheden = $request->bezonderheden;

        $product->save();

        $product->menuProduct()->update(['product_id' => $product->id, 'menu_id' => $request->menu]);

        if(!empty($request->ingredients)){
            $product->productIngredient()->where('product_id', $product->id)->delete();
            foreach ($request->ingredients as $ingredient){
                $product->productIngredient()->insert([['product_id' => $product->id, 'ingredient_id' => $ingredient],]);
            }
        }

        return response()->json($product);
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
