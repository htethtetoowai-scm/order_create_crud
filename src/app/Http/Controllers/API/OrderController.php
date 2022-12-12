<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Contracts\Services\API\OrderServiceInterface;
use App\Http\Controllers\API\BaseController as BaseController;

class OrderController extends BaseController
{
    /**
     * Order Interface
     */
    private $orderService;
    public function __construct(OrderServiceInterface $orderServiceInterface)
    {
        $this->orderService = $orderServiceInterface;
    }
    /**
     * Store a newly created category in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrder(Request $request)
    {
        $request->validate([
            'items' => 'required',
            'items.*.item_id' => 'required',
            'items.*.quantity' => 'required',
        ]);
        $this->orderService->saveOrder($request);
        return $this->sendResponse(null, 'Order create successfully.');
    }
}
