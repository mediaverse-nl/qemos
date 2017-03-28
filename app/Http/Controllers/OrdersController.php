<?php

namespace App\Http\Controllers;

use App\Excluded;
use App\Ingredient;
use App\Menu;
use App\Order;
use App\OrderedItem;
use App\Product;
use App\Tafel;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $orders;
    protected $tafels;
    protected $menu;
    protected $product;

    public function __construct()
    {
        $this->orders = new Order();
        $this->product = new Product();
        $this->tafels = new Tafel();
        $this->menu = new Menu();
        $this->ingredients = new Ingredient();
    }

    public function get($id)
    {
        $tafel = $this->tafels->find($id);

        $order = $this->orders->where('status', 'open')->where('tafel_id', $tafel->id)->first();

        return response()->json(
            $order->orderedItem()
                ->with('product')
                ->with('excluded')
//                ->rightJoin('excluded_ingredient', 'excluded_ingredient.ordered_items_id', '=', 'ordered_items.id')
                ->join('ingredients', 'ingredients.id', '=', 'excluded.ingredient_id')
                ->get(),
        200);
    }

    public function save(Request $request)
    {
        $tafel = $this->tafels->find($request->tafel_id);

        $order = $this->orders->where('status', 'open')->where('tafel_id', $tafel->id)->first();

        foreach ($order->orderedItem()->where('status', 'open')->get() as $item){
            $item->update(['status' => 'bevestigd']);
        }

        return response()->json('ok', 200);
    }

    public function add(Request $request)
    {
        $order = $this->orders->where('status', 'open')->where('tafel_id', $request->tafel_id)->first();

        if(!empty($order)){
            $order->orderedItem()->insert(['product_id' => $request->product_id, 'order_id' => $order->id, 'prijs' => 0]);
        }else{
            $order = $this->orders;

            $order->tafel_id = $request->tafel_id;
            $order->status = 'open';
            $order->korting = 0;

            $order->save();

            $order->orderedItem()->insert(['product_id' => $request->product_id, 'order_id' => $order->id, 'prijs' => 0]);
            $order->tafels()->update(['bezet' => 1]);
        }

        return response()->json($order->exists(), 200);
    }

    public function ingredients($id)
    {
        $product = $this->product->find($id);
        $ingredients = $product->productIngredient()->with('ingredient')->with('product')->get();

        return response()->json([$ingredients, 'as'], 200);
    }

    public function excluded(Request $request)
    {
        $orderedItem = OrderedItem::find($request->ordered_item_id);

        $orderedItem->excluded()->where('ordered_items_id', $orderedItem->id)->delete();

        foreach ($request->ingredients as $ingredient){
            $orderedItem->excluded()->insert(['ordered_items_id' => $orderedItem->id, 'ingredient_id' => (int)$ingredient]);
        }

        return response()->json( $orderedItem, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.order.index')->with('tafels', $this->tafels->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('auth.order.show')
            ->with('products', $this->product->get())
            ->with('menus', $this->menu->get())
            ->with('tafels', $this->tafels->findOrfail($id));
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
        //
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
