<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BannerSection;
use App\Models\Category;
use App\Models\CounterSection;
use App\Models\CustomPage;
use App\Models\FeaturedAuthorSection;
use App\Models\FeaturedCategory;
use App\Models\HeroSection;
use App\Models\HighlightedProduct;
use App\Models\Item;
use App\Models\MonthlyPickProduct;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(): View
    {
        $heroSection = HeroSection::first();
        $featuredCategories = Category::withCount(['items' => function ($query) {
            $query->where('status', 'approved');
        }])->where('show_at_featured', 1)->get();


        $subCategory = FeaturedCategory::first()?->category_ids ?? [];

        $featuredItems = collect();

        foreach($subCategory as $categoryId) {
            $items = Item::where('sub_category_id', $categoryId)
                ->with('author:id,name')
                ->withCount(['sales', 'reviews'])
                ->withAvg('reviews', 'stars')
                ->where('status', 'approved')
                ->with('subCategory:id,name')
                ->latest()
                ->take(8)
                ->get();
               $featuredItems[$items->first()->subCategory->name ?? $categoryId] = $items;
        }

        $highlightedProductSection = HighlightedProduct::first();
        $highlightedProducts = Item::withCount(['sales', 'reviews'])
            ->withAvg('reviews', 'stars')
            ->where('status', 'approved')
            ->whereIn('id', $highlightedProductSection?->item_ids ?? [])
            ->take(4)->get();

        $monthlyPickedProductSection = MonthlyPickProduct::first();
        $monthlyPickedProducts = Item::withCount(['sales', 'reviews'])
            ->withAvg('reviews', 'stars')
            ->where('status', 'approved')
            ->whereIn('id', $monthlyPickedProductSection?->item_ids ?? [])
            ->take(8)->get();
        $featuredAuthorSection = FeaturedAuthorSection::first();
        $featuredAuthorProducts = Item::where('author_id', $featuredAuthorSection?->author_id)->latest()->take(4)->get();

        $counterSection = CounterSection::first();

        $bannerSection = BannerSection::first();


        return view(
            'frontend.home.index',
            compact(
                'heroSection',
                'featuredCategories',
                'featuredItems',
                'highlightedProductSection',
                'highlightedProducts',
                'monthlyPickedProductSection',
                'monthlyPickedProducts',
                'featuredAuthorSection',
                'featuredAuthorProducts',
                'counterSection',
                'bannerSection'

            )
        );
    }

    function highlightedProducts(): View
    {
        $highlightedProductSection = HighlightedProduct::first();
        $highlightedProducts = Item::withCount(['sales', 'reviews'])
            ->withAvg('reviews', 'stars')
            ->where('status', 'approved')
            ->whereIn('id', $highlightedProductSection->item_ids)
            ->paginate(12);
        return view('frontend.pages.highlighted-product', compact('highlightedProducts'));
    }

    function page(string $slug) : View
    {
        $page = CustomPage::where('slug', $slug)->first();
        return view('frontend.pages.custom-page', compact('page'));
    }
}
