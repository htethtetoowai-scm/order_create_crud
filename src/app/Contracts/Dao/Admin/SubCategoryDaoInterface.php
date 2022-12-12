<?php

namespace App\Contracts\Dao\Admin;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for SubCategory
 */
interface SubCategoryDaoInterface
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
