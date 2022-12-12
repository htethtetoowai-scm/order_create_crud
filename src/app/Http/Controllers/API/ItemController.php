<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Contracts\Services\Admin\ItemServiceInterface;

class ItemController extends Controller
{
    /**
     * Item Service Interface
     */
    private $itemService;
    public function __construct(ItemServiceInterface $itemServiceInterface)
    {
        $this->itemService = $itemServiceInterface;
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemService->getAllItem();
        return ItemResource::collection($items);
    }

    /**
     * Display detail of specified item.
     * @param int $i
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $item = $this->itemService->findItemById($id);
        return new ItemResource($item);
    }
}
