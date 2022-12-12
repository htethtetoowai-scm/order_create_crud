<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\SubCategory\StoreSubCategoryRequest;
use App\Http\Requests\Admin\SubCategory\EditSubCategoryRequest;
use App\Contracts\Services\Admin\SubCategoryServiceInterface;
use App\Contracts\Services\Admin\CategoryServiceInterface;


class SubCategoryController extends Controller
{
    /**
     * SubCategory Interface
     */
    private $subCategoryService;
    private $categoryService;
    public function __construct(
        SubCategoryServiceInterface $subCategoryServiceInterface,
        CategoryServiceInterface $categoryServiceInterface
    ) {
        $this->subCategoryService = $subCategoryServiceInterface;
        $this->categoryService = $categoryServiceInterface;
    }
    /**
     * Display a listing of the subCategories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = $this->subCategoryService->getAllSubCategory();
        return view('admin.sub-categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new subCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getAllCategory();;
        return view('admin.sub-categories.create', compact('categories'));
    }

    /**
     * Store a newly created subCategory in storage.
     *
     * @param  \App\Http\Requests\Admin\SubCategory\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $this->subCategoryService->createSubCategory($request);
        return redirect()->route('subCategories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified subCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subCategory =  $this->subCategoryService->findSubCategoryById($id);
        return view('admin.sub-categories.show', compact('subCategory'));
    }

    /**
     * Show the form for editing the specified subCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory =  $this->subCategoryService->findSubCategoryById($id);
        $categories = $this->categoryService->getAllCategory();;
        return view('admin.sub-categories.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified subCategory in storage.
     *
     * @param  \App\Http\Requests\Admin\SubCategory\EditSubCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSubCategoryRequest $request, $id)
    {
        $this->subCategoryService->updateSubCategory($request, $id);
        return redirect()->route('subCategories.index')
            ->with('success', 'Category edited successfully.');
    }

    /**
     * Remove the specified subCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory =  $this->subCategoryService->deleteSubCategory($id);
        return redirect()->route('subCategories.index')
            ->with('success', 'Category deleted successfully.');
    }


    /**
     * Get subcategories with ajax.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubCategories()
    {
        $subCategories = $this->subCategoryService->getAllSubCategory();
        return response()->json(['data' => $subCategories]);
    }
}
