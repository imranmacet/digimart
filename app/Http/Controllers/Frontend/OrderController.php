<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AuthorSale;
use App\Models\PurchaseItem;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index() : View
    {
        $purchases = PurchaseItem::where('user_id', user()->id)->paginate(25);
        return view('frontend.dashboard.order.index', compact('purchases'));     
    }

    function show(string $id) : View
    {
        $purchaseItem = PurchaseItem::findOrFail($id);
        return view('frontend.dashboard.order.show', compact('purchaseItem'));
    }

    function transactions() : View
    {
        $transactions = Transaction::where('user_id', user()->id)->latest()->paginate(25);
        return view('frontend.dashboard.order.transaction', compact('transactions'));
    }

    function sales() : View
    {
        abort_if(user()->user_type != 'author', 403);
        $sales = AuthorSale::where('author_id', user()->id)->latest()->paginate(25);
        return view('frontend.dashboard.order.sales', compact('sales'));
    }
}
