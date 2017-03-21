<?php

namespace App\Http\Controllers;

use App\Product;
use Validator;
use Input;
use Illuminate\Http\Request;

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
        $rules = [
            'naam' => 'required',
            'bereidingsduur' => 'required',
            'status' => 'required',
            'beschrijving' => 'required',
            'prijs' => 'required',
//                'password' => 'required'
        ];
//
        $validator = Validator::make($request->all(), $rules);
//
        if ($validator->fails())
        {
            return  response()->json($validator->getMessageBag()->toArray(), 200); // 400 being the HTTP code for an invalid request.
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
//        $validator = Validator::make($request->all(), [
////            'aantal_plaatsen' => 'required',
//            'status_test' => 'required',
//        ]);
//
//        if ($validator->fails()) {
////            return response()->json(['data' =>$validator]);
//            return redirect()
//                ->route('product.index')
//                ->withErrors($validator)
//                ->withInput()
//                ->with('id', $id);
//        }
//
//        $product = $this->product->findOrFail($id);
//
//        $product->bereidingsduur = $request->bereidingsduur;
//        $product->naam = $request->naam;
//        $product->prijs = $request->prijs;
//        $product->beschrijving = $request->beschrijving;
//        $product->status = $request->status;
//
//        $product->save();
//
//        return redirect()->route('product.index');

//        function(Request $request, $id){

            $rules = [
                'naam' => 'required',
                'bereidingsduur' => 'required',
//                'password' => 'required'
            ];
//
            $validator = Validator::make($request->all(), $rules);
//
            if ($validator->fails())
            {
                return  response()->json($validator->getMessageBag()->toArray()); // 400 being the HTTP code for an invalid request.
            }

            $task = $this->product->find($id);

            $task->naam = $request->naam;
            $task->bereidingsduur = $request->bereidingsduur;
            $task->prijs = $request->prijs;
            $task->beschrijving = $request->beschrijving;
            $task->status = $request->status;

            $task->save();

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
        //
    }
}
