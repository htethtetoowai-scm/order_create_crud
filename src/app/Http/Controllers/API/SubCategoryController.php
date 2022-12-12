<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Contracts\Services\Admin\SubCategoryServiceInterface;

class SubCategoryController extends Controller
{
    /**
     * SubCategory Interface
     */
    private $subCategoryService;
    public function __construct(SubCategoryServiceInterface $subCategoryServiceInterface) {
        $this->subCategoryService = $subCategoryServiceInterface;
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = $this->subCategoryService->getAllSubCategory();
        return SubCategoryResource::collection($subCategories);
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $subCategory = $this->subCategoryService->findSubCategoryById($id);
        return new SubCategoryResource($subCategory);
    }
}
