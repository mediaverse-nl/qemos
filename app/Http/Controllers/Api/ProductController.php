<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProduct;
use App\Product;
use Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
//        $this->product = $this->product->where('', '', $request->header('Authorization'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->product->with(['menu.banner', 'productPeculiarity.Peculiarity', 'productIngredient.Ingredient', 'image'])->get();

        return response()->json(['data' => $product])->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $product = $this->product;

        $product->location_id = $request->location_id;
        $product->menu_id = $request->menu_id;
        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
//        $product->status = $request->status;

        $product->save();

        return response()->json(['data' => $product, 'message' => 'stored with success.'])->setStatusCode(200);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with(['productIngredient.ingredient', 'image', 'menu', 'productPeculiarity.peculiarity'])->findOrFail($id);

        return response()->json($product)->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $product->location_id = $request->location_id;
        $product->menu_id = $request->menu_id;
        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;

        $product->save();

        return response()->json(['data' => $product, 'message' => 'updated with success.'])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        $product->delete();

        return response()->json(['data' => $product, 'message' => 'delete with success.'])->setStatusCode(200);;
    }
}
