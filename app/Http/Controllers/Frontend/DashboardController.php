<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AuthorSale;
use App\Models\Item;
use App\Models\ItemReview;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index() : View{
        $purchaseCount = Purchase::where('user_id', user()->id)->count();
        $reviewCount = ItemReview::where('user_id', user()->id)->count();
        $totalSpent  = PurchaseItem::where('user_id', user()->id)->sum('price');
        $totalItems = Item::where('author_id', user()->id)->count();
        $totalSales = AuthorSale::where('user_id', user()->id)->sum('author_earning');
        return view('frontend.dashboard.index', compact('purchaseCount', 'reviewCount', 'totalSpent', 'totalItems', 'totalSales'));
    }

    function reviews() : View
    {
        $reviews = ItemReview::where('user_id', user()->id)->latest()->paginate(25);
       
        return view('frontend.dashboard.review.index', compact('reviews'));     
    }
}
