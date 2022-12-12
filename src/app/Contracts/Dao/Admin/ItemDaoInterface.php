<?php

namespace App\Contracts\Dao\Admin;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Item
 */
interface ItemDaoInterface
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
     * @return array $dashboardData
     */
    public function updateItem($request, $id);

    /**
     * To update item image
     * @param int $id
     */
    public function updateItemImage($filePath, $id);

    /**
     * To delete item data
     * @param int $id
     */
    public function deleteItem($id);

}
