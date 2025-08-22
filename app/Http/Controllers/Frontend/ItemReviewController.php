<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemReview;
use App\Models\PurchaseItem;
use App\Services\NotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ItemReviewController extends Controller
{
    function store(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['required', 'string', 'max:2000'],
        ]);

        if(PurchaseItem::where('item_id', $id)->where('user_id', user()->id)->doesntExist()) {
            NotificationService::ERROR('You have not purchased this item!');
           return back(); 
        }elseif(ItemReview::where('item_id', $id)->where('user_id', user()->id)->exists()) {
            NotificationService::ERROR('You have already reviewed this item!');
            return back();
        }
        
        $item = Item::findOrFail($id);

        $review = new ItemReview();
        $review->item_id = $item->id;
        $review->user_id = user()->id;
        $review->author_id = $item->author_id;
        $review->stars = $request->rating;
        $review->body = $request->review;
        $review->save();

        NotificationService::CREATED('Review added successfully!');

        return back();

    }
}
