<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeaturedCategory;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FeaturedCategoryController extends Controller implements HasMiddleware
{

    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage sections')
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::all();
        $featuredCategories = FeaturedCategory::first();
        return view('admin.sections.featured-category.index', compact('categories', 'featuredCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categories' => ['required', 'array']
        ]);

        FeaturedCategory::updateOrCreate(
            ['id' => 1],
            ['category_ids' => $request->categories]
        );

        NotificationService::UPDATED();

        return back();
    }
}
