<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Contracts\Services\Admin\CategoryServiceInterface;

class CategoryController extends Controller
{
    /**
     * SubCategory Service Interface
     */
    private $categoryService;
    public function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
        $this->categoryService = $categoryServiceInterface;
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategory();
        return CategoryResource::collection($categories);
    }

    /**
     * Display detail of specified item
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $category = $this->categoryService->findCategoryById($id);
        return new CategoryResource($category);
    }
}
