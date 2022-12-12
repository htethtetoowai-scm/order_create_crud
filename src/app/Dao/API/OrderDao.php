<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\API\OrderDaoInterface;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Illuminate\Support\Facades\Auth;

/**
 * Data Access Object for User
 */
class OrderDao implements OrderDaoInterface
{
    /**
     * To save oder
     * @param  Illuminate\Http\Request  $request
     */
    public function saveOrder($request)
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
            DB::rollBack();
        }
    }
}
