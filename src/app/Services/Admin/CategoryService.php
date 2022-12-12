<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\CategoryDaoInterface;
use App\Contracts\Services\Admin\CategoryServiceInterface;

/**
 * Service class for Category.
 */
class CategoryService implements CategoryServiceInterface
{
    /**
     * category Dao,
     */
    private $categoryDao;

    /**
     * Class Constructor
     *
     * @param categoryDaoInterface
     * @return
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * To get category data
     * @return array $categoryData
     */
    public function getAllCategory()
    {
        $categorys = $this->categoryDao->getAllCategory();
        return $categorys;
    }

    /**
     * To create new category
     * @param  Illuminate\Http\Request  $request
     */
    public function createCategory($request)
    {
        $this->categoryDao->createCategory($request);
    }

    /**
     * To get category data
     * @param int $id
     * @return array $categoryData
     */
    public function findCategoryById($id)
    {
        return $this->categoryDao->findCategoryById($id);
    }

    /**
     * To update category data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateCategory($request, $id)
    {
        $this->categoryDao->updateCategory($request, $id);
    }

    /**
     * To delete category data
     * @param int $id
     */
    public function deleteCategory($id)
    {
        $this->categoryDao->deleteCategory($id);
    }
}
