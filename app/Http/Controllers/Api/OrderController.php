<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request)
    {
         $order = new Order();
         $order->client_id = $request->client_id;
         $order->driver_id = $request->driver_id;
         $order->addres = $request->addres;
         $order->message = $request->message;
         $order->order_type = $request->order_type;
         $order->count_user = $request->count_user;
         $order->price = $request->price;
         $order->save();
         return $order;
    }
    
    public function update(Request $request)
    {
        $order = Order::find($request->id);
        $order->client_id = $request->client_id;
        $order->driver_id = $request->driver_id;
        $order->addres = $request->addres;
        $order->message = $request->message;
        $order->order_type = $request->order_type;
        $order->count_user = $request->count_user;
        $order->price = $request->price;
        $order->save();
        return $order;
    }

    public function all()
    {
        return Order::all();
    }

    public function show(int $id)
    {
        return Order::find($id);
    }
}
