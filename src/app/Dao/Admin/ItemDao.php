<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\ItemDaoInterface;
use App\Models\Item;

/**
 * Data Access Object for Item
 */
class ItemDao implements ItemDaoInterface
{
    /**
     * To get item data
     * @return array $itemData
     */
    public function getAllItem()
    {
        $items = Item::all();
        return $items;
    }

    /**
     * To create new item
     * @param  Illuminate\Http\Request  $request
     */
    public function createItem($request)
    {
        $item = Item::create([
            'category_id' => $request->input('category'),
            'sub_category_id' => $request->input('subCategory'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return $item->id;
    }

    /**
     * To get item data
     * @param int $id
     * @return array $itemData
     */
    public function findItemById($id)
    {
        return Item::findOrFail($id);
    }

    /**
     * To update item data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateItem($request, $id)
    {
        Item::where('id', $id)
            ->update([
                'category_id' => $request->input('category'),
                'sub_category_id' => $request->input('subCategory'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
            ]);
    }

    /**
     * To update item image
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateItemImage($filePath, $id)
    {
        Item::where('id', $id)
            ->update([
                'image_path' => $filePath,
            ]);
    }

    /**
     * To delete item data
     * @param int $id
     */
    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    }
}
