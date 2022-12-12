<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\EditItemRequest;
use App\Http\Requests\Admin\Item\StoreItemRequest;
use App\Contracts\Services\Admin\ItemServiceInterface;
use App\Contracts\Services\Admin\CategoryServiceInterface;
use App\Contracts\Services\Admin\SubCategoryServiceInterface;

class ItemController extends Controller
{

    /**
     * Item Service Interface
     */
    private $itemService;
    private $categoryService;
    private $subCategoryService;
    public function __construct(
        ItemServiceInterface $itemServiceInterface,
        CategoryServiceInterface $categoryServiceInterface,
        SubCategoryServiceInterface $subCategoryServiceInterface
    ) {
        $this->itemService = $itemServiceInterface;
        $this->categoryService = $categoryServiceInterface;
        $this->subCategoryService = $subCategoryServiceInterface;
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
        $categories = $this->categoryService->getAllCategory();
        $subCategories = $this->subCategoryService->getAllSubCategory();
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
        $itemId = $this->itemService->createItem($request);
        $this->itemService->saveImageFile($request->file('image'), $itemId);
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
        $categories = $this->categoryService->getAllCategory();
        $subCategories = $this->subCategoryService->getAllSubCategory();
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
        $this->itemService->saveImageFile($request->file('image'), $id);
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
