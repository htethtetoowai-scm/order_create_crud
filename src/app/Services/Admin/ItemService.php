<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\ItemDaoInterface;
use App\Contracts\Services\Admin\ItemServiceInterface;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for Item.
 */
class ItemService implements ItemServiceInterface
{
    /**
     * item Dao,
     */
    private $itemDao;

    /**
     * Class Constructor
     *
     * @param itemDaoInterface
     * @return
     */
    public function __construct(ItemDaoInterface $itemDao)
    {
        $this->itemDao = $itemDao;
    }

    /**
     * To get item data
     * @return array $itemData
     */
    public function getAllItem()
    {
        $items = $this->itemDao->getAllItem();
        return $items;
    }

    /**
     * To create new item
     * @param  Illuminate\Http\Request  $request
     */
    public function createItem($request)
    {
        $itemId = $this->itemDao->createItem($request);
        return $itemId;
    }

    /**
     * To get item data
     * @param int $id
     * @return array $itemData
     */
    public function findItemById($id)
    {
        return $this->itemDao->findItemById($id);
    }

    /**
     * To update item data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     * @return array $dashboardData
     */
    public function updateItem($request, $id)
    {
        $this->itemDao->updateItem($request, $id);
    }

    /**
     * To update item image
     * @param int $id
     */
    public function updateItemImage($filePath, $id)
    {
        $this->itemDao->updateItemImage($filePath, $id);
    }

    /**
     * To save image into local path
     * @param Illuminate\Http\Request  $request
     */
    public function saveImageFile($file, $itemId)
    {
        $filePath = null;
        if ($file) {
            $folderPath = 'items';
            // Check if file is not null
            if ($file) {
                // get file name
                $file_extension = $file->getClientOriginalExtension();
                $file_name = $itemId . '.' . $file_extension;

                // save the file
                $filePath = Storage::disk('public')->putFileAs($folderPath, $file, $file_name);
            }
            $this->updateItemImage($filePath, $itemId);
        }
    }

    /**
     * To delete item data
     * @param int $id
     */
    public function deleteItem($id)
    {
        $this->itemDao->deleteItem($id);
    }
}
