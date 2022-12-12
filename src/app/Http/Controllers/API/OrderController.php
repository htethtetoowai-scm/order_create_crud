<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Store a newly created category in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrder(Request $request)
    {
        DB::beginTransaction();
        try {

            $order = new Order();
            $order->user_id = Auth::guard('api')->id();
            $order->delivery_email = $request['delivery_email'];
            $order->delivery_phone = $request['delivery_phone'];
            $order->delivery_address = $request['delivery_address'];
            $order->save();

            foreach ($request['items'] as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->item_id = $item['item_id'];
                $orderItem->price = $item['price'] * $item['quantity'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollBack();
        }
        return response(['message' => 'successful']);
    }
}
