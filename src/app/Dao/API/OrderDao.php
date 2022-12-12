<?php

namespace App\Dao\API;

use App\Contracts\Dao\API\OrderDaoInterface;
use App\Models\Item;
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
            $authUser = Auth::guard('api')->user();
            $order = new Order();
            $order->user_id = $authUser->id;
            $order->delivery_email = ($request['delivery_email']) ? $request['delivery_email'] : $authUser->email;
            $order->delivery_phone = ($request['delivery_phone']) ? $request['delivery_phone'] : $authUser->phone;
            $order->delivery_address = ($request['delivery_address']) ? $request['delivery_address'] : $authUser->address;
            $order->save();

            foreach ($request['items'] as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->item_id = $item['item_id'];
                $singlePrice = Item::where('id', $item['item_id'])->first()->price;
                $orderItem->price = $singlePrice * $item['quantity'];
                $orderItem->quantity = $item['quantity'];
                $orderItem->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
