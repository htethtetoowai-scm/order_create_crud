<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\SubCategoryDaoInterface;
use App\Models\SubCategory;

/**
 * Data Access Object for SubCategory
 */
class SubCategoryDao implements SubCategoryDaoInterface
{
    /**
     * To get subCategory data
     * @return array $subCategoryData
     */
    public function getAllSubCategory()
    {
        $subCategorys = SubCategory::all();
        return $subCategorys;
    }

    /**
     * To create new subCategory
     * @param  Illuminate\Http\Request  $request
     */
    public function createSubCategory($request)
    {
        SubCategory::create($request->all());
    }

    /**
     * To get subCategory data
     * @param int $id
     * @return array $subCategoryData
     */
    public function findSubCategoryById($id)
    {
        return SubCategory::findOrFail($id);
    }

    /**
     * To update subCategory data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateSubCategory($request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->title = $request->input('title');
        $subCategory->category_id = $request->input('category_id');
        $subCategory->description = $request->input('description');
        $subCategory->update();
    }

    /**
     * To delete subCategory data
     * @param int $id
     */
    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
    }
}
