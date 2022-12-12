<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\CategoryDaoInterface;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

/**
 * Data Access Object for Category
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * To get category data
     * @return array $categoryData
     */
    public function getAllCategory()
    {
        $categorys = Category::all();
        return $categorys;
    }

    /**
     * To create new category
     * @param  Illuminate\Http\Request  $request
     */
    public function createCategory($request)
    {
        Category::create($request->all());
    }

    /**
     * To get category data
     * @param int $id
     * @return array $categoryData
     */
    public function findCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * To update category data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateCategory($request, $id)
    {
        Category::where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
            ]);
    }

    /**
     * To delete category data
     * @param int $id
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
