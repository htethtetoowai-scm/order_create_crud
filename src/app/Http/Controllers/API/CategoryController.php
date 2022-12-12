<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }
}
