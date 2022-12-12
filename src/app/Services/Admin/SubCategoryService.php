<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\SubCategoryDaoInterface;
use App\Contracts\Services\Admin\SubCategoryServiceInterface;

/**
 * Service class for SubCategory.
 */
class SubCategoryService implements SubCategoryServiceInterface
{
    /**
     * subCategory Dao,
     */
    private $subCategoryDao;

    /**
     * Class Constructor
     *
     * @param subCategoryDaoInterface
     * @return
     */
    public function __construct(SubCategoryDaoInterface $subCategoryDao)
    {
        $this->subCategoryDao = $subCategoryDao;
    }

    /**
     * To get subCategory data
     * @return array $subCategoryData
     */
    public function getAllSubCategory()
    {
        $subCategorys = $this->subCategoryDao->getAllSubCategory();
        return $subCategorys;
    }

    /**
     * To create new subCategory
     * @param  Illuminate\Http\Request  $request
     */
    public function createSubCategory($request)
    {
        $this->subCategoryDao->createSubCategory($request);
    }

    /**
     * To get subCategory data
     * @param int $id
     * @return array $subCategoryData
     */
    public function findSubCategoryById($id)
    {
        return $this->subCategoryDao->findSubCategoryById($id);
    }

    /**
     * To update subCategory data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateSubCategory($request, $id)
    {
        $this->subCategoryDao->updateSubCategory($request, $id);
    }

    /**
     * To delete subCategory data
     * @param int $id
     */
    public function deleteSubCategory($id)
    {
        $this->subCategoryDao->deleteSubCategory($id);
    }
}
