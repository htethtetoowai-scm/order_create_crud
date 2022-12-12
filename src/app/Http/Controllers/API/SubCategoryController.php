<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return SubCategoryResource::collection($subCategories);
    }

    /**
     * Display a listing of the items.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return new SubCategoryResource($subCategory);
    }
}
