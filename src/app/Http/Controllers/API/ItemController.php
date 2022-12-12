<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return ItemResource::collection($items);
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $item = Item::findOrFail($id);
        return new ItemResource($item);
    }

}
