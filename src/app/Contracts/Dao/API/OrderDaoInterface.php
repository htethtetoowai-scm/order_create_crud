<?php

namespace App\Contracts\Dao\API;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Order
 */
interface OrderDaoInterface
{
    /**
     * To save oder
     * @param  Illuminate\Http\Request  $request
     */
    public function saveOrder($request);
}
