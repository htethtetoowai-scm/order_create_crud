<?php

namespace App\Contracts\Services\API;

/**
 * Interface for Order service.
 */
interface OrderServiceInterface
{
    /**
     * To save oder
     * @param  Illuminate\Http\Request  $request
     */
    public function saveOrder($request);
}
