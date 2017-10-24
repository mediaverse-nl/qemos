<?php

namespace App\Http\Controllers\Staff;

use App\Helper\FileUpload;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreProduct;
use App\Ingredient;
use App\Menu;
use App\Peculiarity;
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
    public function index()
    {
        return view('staff.product.index')
            ->with('products', $this->product->get())
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
        $product = $this->product;
        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;
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

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
//        return response()->json($request);

//        $image = $request->file('image');
//        $ext = $image->getClientOriginalExtension();
//        $image->move('images/text/', $image->getFilename().'.'.$ext);
//        $abc = new FileUpload('/image', $request);
//        return response()->json($request);
//        return response()->json($request->);

        $product = $this->product->findOrFail($id);

        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;
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
