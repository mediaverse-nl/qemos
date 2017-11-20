<?php

namespace App\Http\Controllers\Staff;

use App\Helper\FileUpload;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreProduct;
use App\Ingredient;
use App\Menu;
use App\Peculiarity;
use App\Permission;
use App\Product;
//use Illuminate\Validation\Rule;
//use Validator;
//use Input;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $ingredient;
    protected $menu;
    protected $peculiarity;

    public function __construct()
    {
        $this->ingredient = new Ingredient();
        $this->menu = new Menu();
        $this->peculiarity = new Peculiarity();

        $this->product = new Product();
        $this->product = $this->product->where('location_id', '=', $this->location());
    }

    public function location(){
        return session('location');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('staff-product.view');

//        $product = $request->get('trash') ? $this->product->withTrashed()->get() : $this->product->get();
        $product = $this->product->withTrashed()->get();

        return view('staff.product.index')
            ->with('products', $product)
            ->with('menu', $this->menu->get())
            ->with('peculiarities', $this->peculiarity->get())
            ->with('ingredients', $this->ingredient->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $this->authorize('staff-product.create');

        $product = new Product();
        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->location_id = $this->location();
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
//        $product->status = $request->status;
        $product->menu_id = $request->menu;
        $product->save();

        if(!empty($request->ingredients)){
            foreach ($request->ingredients as $ingredient){
                $product->productIngredient()->insert([['product_id' => $product->id, 'ingredient_id' => $ingredient],]);
            }
        }

        if(!empty($request->peculiarity)){
            foreach ($request->peculiarity as $peculiarity){
                $product->productPeculiarity()->insert([['product_id' => $product->id, 'peculiarity_id' => $peculiarity],]);
            }
        }

        return response()->json($product->with('menu')->findOrFail($product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('staff-product.view');

        $product = $this->product->with(['productIngredient', 'productPeculiarity', 'menu'])->find($id);

        return response()->json($product, 200);
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
//        $this->authorize('staff-product.update', Product::class);

        $product = $this->product->findOrFail($id);

        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
//        $product->status = $request->status;
        $product->menu_id = $request->menu;

        $product->save();

        if(!empty($request->ingredients)){
            $product->productIngredient()->where('product_id', $product->id)->delete();
            foreach ($request->ingredients as $ingredient){
                $product->productIngredient()->insert([['product_id' => $product->id, 'ingredient_id' => $ingredient],]);
            }
        }

        if(!empty($request->peculiarity)){
            $product->productPeculiarity()->where('product_id', $product->id)->delete();
            foreach ($request->peculiarity as $peculiarity){
                $product->productPeculiarity()->insert([['product_id' => $product->id, 'peculiarity_id' => $peculiarity],]);
            }
        }

        return response()->json($product->with('menu')->findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('staff-product.delete', $this->product->findOrFail($id));

        $product = $this->product->findOrFail($id);

        $product->destroy($id);

        return response()->json($product, 200);
    }
}
