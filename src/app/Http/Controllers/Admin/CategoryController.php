<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\EditCategoryRequest;
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
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategory();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  App\Http\Requests\Admin\Category\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->createCategory($request);
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryService->findCategoryById($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->findCategoryById($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  App\Http\Requests\Admin\Category\EditCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $this->categoryService->updateCategory($request, $id);
        return redirect()->route('categories.index')
            ->with('success', 'Category edited successfully.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
