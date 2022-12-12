<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Http\Requests\Admin\Item\EditItemRequest;
use App\Http\Requests\Admin\Item\StoreItemRequest;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use App\Contracts\Services\Admin\ItemServiceInterface;

class ItemController extends Controller
{

    /**
     * Item Interface
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
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.items.create', compact('categories', 'subCategories'));
    }

    /**
     * Store a newly created item in storage.
     *
     * @param  \App\Http\Requests\Admin\Item\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        $filePath = null;
        $itemId = $this->itemService->createItem($request);
        if ($request->file('image')) {
            $file = $request->file('image');
            $folderPath = 'items';
            // Check if file is not null
            if ($file) {
                // get file name
                $file_extension = $file->getClientOriginalExtension();
                $file_name = $itemId . '.' . $file_extension;

                // save the file
                $filePath = Storage::disk('public')->putFileAs($folderPath, $file, $file_name);
            }
            $this->itemService->updateItemImage($filePath, $itemId);
        }

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->itemService->findItemById($id);
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->itemService->findItemById($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.items.edit', compact('item', 'categories', 'subCategories'));
    }

    /**
     * Update the specified item in storage.
     *
     * @param  \App\Http\Requests\Admin\Item\EditItemRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditItemRequest $request, $id)
    {
        $this->itemService->updateItem($request, $id);
        if ($request->file('image')) {
            $file = $request->file('image');
            $folderPath = 'items/';
            // Check if file is not null
            if ($file) {
                // get file name
                $file_extension = $file->getClientOriginalExtension();
                $file_name = $id . '.' . $file_extension;

                // save the file
                $filePath = Storage::disk('public')->putFileAs($folderPath, $file, $file_name);
            }
            $this->itemService->updateItemImage($filePath, $id);
        }
        return redirect()->route('items.index')
            ->with('success', 'Item edited successfully.');
    }

    /**
     * Remove the specified item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->itemService->deleteItem($id);
        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
