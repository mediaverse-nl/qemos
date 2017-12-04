<?php

namespace App\Http\Controllers\Api;

use App\Excluded;
use App\Location;
use App\Order;
use App\OrderedItem;
use App\Product;
use App\User;
use App\Whitelist;
use Dingo\Api\Routing\Helpers;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use JWTAuth;
use App\Transformers\UserTransformer;


class OrderController extends Controller
{
    // todo documentations - https://github.com/dingo/api/wiki/Responses
    use Helpers;

    protected $order;
    protected $product;
    protected $orderedItem;
    protected $excluded;
    protected $location;

    public function __construct()
    {
        $this->order = new Order();
        $this->orderedItem = new OrderedItem();
        $this->excluded = new Excluded();
        $this->product = new Product();
        $this->location = new Location();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        try{
//            $orders = User::all();
//
//            return $this->response->collection($orders, new UserTransformer)->setStatusCode(200);

//        }catch (Exception $e){
//            return $e;
//        }

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

    //todo this is for the test output
    public function arrayJson(){
        $array = [ 
            "products" => [
                [
                    "product_id" => 1,  
                    "quantity" => 2,  
                    "excluded" => [
                        1, 2, 3 
                    ],
                ],[
                    "product_id" => 2,
                    "quantity" => 1,
                    "excluded" => [
                        1, 5
                    ],
                ],
            ],
        ];

        return json_encode($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = $this->location->getLocationFromApiToken($request);

        $new_order = (object) json_decode($request->order, false);

        //order
        $order = $this->order;
        $order->location_id = $location->id;
        $order->korting = 0;
        $order->save();

        //ordered_items
        foreach ($new_order->products as $product){
            $p = $this->product->findOrFail($product->product_id);
            $orderedItem = $this->orderedItem->create([
                'prijs' => $p->prijs,
                'order_id' => $order->id,
                'product_id' => $p->id,
                'quantity' => $product->quantity,
            ]);
            //excluded
            foreach ($product->excluded as $excluded){
                $this->excluded->insert([
                    'ordered_items_id' => $orderedItem->id,
                    'ingredient_id' => $excluded,
                ]);
            }
        }

        $updatedOrder = $this->order->findOrFail($order->id);
        $updatedOrder->status = 'paid';
        $updatedOrder->prijs = $order->total();
        $updatedOrder->save();

        //response order
        return $updatedOrder->with('orderedItem.excluded.ingredient')->findOrFail($order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        return \Tymon\JWTAuth\JWTAuth::parseToken()->toUser();

//        try{
//            $order = User::findOrFail($id);
//
//            return $this->response->item($order, new UserTransformer)->setStatusCode(200);

//        }catch (Exception $e)
//        {
//            return $e;
//        }
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
