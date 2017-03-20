<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
use Input;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProductsController extends Controller
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.product.index')->with('products', $this->product->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'aantal_plaatsen' => 'required',
            'status_test' => 'required',
        ]);

        if ($validator->fails()) {
//            return response()->json(['data' =>$validator]);
            return redirect()
                ->route('product.create')
                ->withErrors($validator)
                ->withInput()
                ->with('id', $request->id);
        }

        $product = $this->product;

        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index');
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
        $validator = Validator::make($request->all(), [
//            'aantal_plaatsen' => 'required',
            'status_test' => 'required',
        ]);

        if ($validator->fails()) {
//            return response()->json(['data' =>$validator]);
            return redirect()
                ->route('product.index')
                ->withErrors($validator)
                ->withInput()
                ->with('id', $id);
        }

        $product = $this->product->findOrFail($id);

        $product->bereidingsduur = $request->bereidingsduur;
        $product->naam = $request->naam;
        $product->prijs = $request->prijs;
        $product->beschrijving = $request->beschrijving;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
