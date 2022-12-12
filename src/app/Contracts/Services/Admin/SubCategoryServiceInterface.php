<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for SubCategory service.
 */
interface SubCategoryServiceInterface
{
    /**
     * To get subCategory data
     * @return array $subCategoryData
     */
    public function getAllSubCategory();

    /**
     * To create new subCategory
     * @param  Illuminate\Http\Request  $request
     */
    public function createSubCategory($request);

    /**
     * To get subCategory data
     * @param int $id
     * @return array $subCategoryData
     */
    public function findSubCategoryById($id);

    /**
     * To update subCategory data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateSubCategory($request, $id);

    /**
     * To delete subCategory data
     * @param int $id
     */
    public function deleteSubCategory($id);
}
