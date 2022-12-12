<?php

namespace App\Services\API;

use App\Contracts\Dao\API\OrderDaoInterface;
use App\Contracts\Services\API\OrderServiceInterface;

/**
 * Service class for Order.
 */
class OrderService implements OrderServiceInterface
{
    /**
     * order Dao,
     */
    private $orderDao;

    /**
     * Class Constructor
     *
     * @param orderDaoInterface
     * @return
     */
    public function __construct(OrderDaoInterface $orderDao)
    {
        $this->orderDao = $orderDao;
    }

    /**
     * To save oder
     * @param  Illuminate\Http\Request  $request
     */
    public function saveOrder($request)
    {
        $this->orderDao->saveOrder($request);
    }
}
