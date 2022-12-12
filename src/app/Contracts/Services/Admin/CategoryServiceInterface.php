<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for Category service.
 */
interface CategoryServiceInterface
{
    /**
     * To get category data
     * @return array $categoryData
     */
    public function getAllCategory();

    /**
     * To create new category
     * @param  Illuminate\Http\Request  $request
     */
    public function createCategory($request);

    /**
     * To get category data
     * @param int $id
     * @return array $categoryData
     */
    public function findCategoryById($id);

    /**
     * To update category data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateCategory($request, $id);

    /**
     * To delete category data
     * @param int $id
     */
    public function deleteCategory($id);
}
