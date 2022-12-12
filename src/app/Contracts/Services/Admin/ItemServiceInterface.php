<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for Item service.
 */
interface ItemServiceInterface
{
    /**
     * To get item data
     * @return array $itemData
     */
    public function getAllItem();

    /**
     * To create new item
     * @param  Illuminate\Http\Request  $request
     */
    public function createItem($request);

    /**
     * To get item data
     * @param int $id
     * @return array $itemData
     */
    public function findItemById($id);

    /**
     * To update item data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateItem($request, $id);

    /**
     * To update item image
     * @param int $id
     */
    public function updateItemImage($filePath, $id);

    /**
     * To save image into local path
     * @param Illuminate\Http\Request  $request
     */
    public function saveImageFile($image, $itemId);

    /**
     * To delete item data
     * @param int $id
     */
    public function deleteItem($id);

}
