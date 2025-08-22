<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemStatusUpdateRequest;
use App\Models\Item;
use App\Models\ItemHistory;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;

class ItemReviewController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:review products')
        ];
    }

    function pendingIndex() : View
    {
        $items = Item::where('status', 'pending')->paginate(25);
        return view('admin.item-review.pending-index', compact('items'));
    }

    function approveIndex() : View
    {
        $items = Item::where('status', 'approved')->paginate(25);
        return view('admin.item-review.approved-index', compact('items'));
    }

    function hardRejectedIndex() : View
    {
        $items = Item::where('status', 'hard_rejected')->paginate(25);
        return view('admin.item-review.hard-rejected-index', compact('items'));
    }

    function softRejectedIndex() : View
    {
        $items = Item::where('status', 'soft_rejected')->paginate(25);
        return view('admin.item-review.soft-rejected-index', compact('items'));
    }

    function resubmittedIndex() : View
    {
        $items = Item::where('status', 'resubmitted')->paginate(25);
        return view('admin.item-review.resubmitted-index', compact('items'));
    }


    function show(string $id) : View
    {
        $item = Item::with('histories')->findOrFail($id);

        return view('admin.item-review.show', compact('item'));
    }

    function updateStatus(ItemStatusUpdateRequest $request, string $id) : RedirectResponse
    {
       $item = Item::findOrFail($id);
       $item->status = $request->status;
       $item->save();

       $history = new ItemHistory();
       $history->item_id = $item->id;
       $history->status = $request->status;
       $history->author_id = $item->author_id;
       $history->reviewer_id = admin()->id;
       switch ($request->status) {
        case 'approved':
            $history->title = 'Item Approved';
            $history->body = 'Congratulations! Your item has been approved.';
            break;

        case 'soft_rejected':
            $history->title = 'Item Soft Rejected';
            $history->body = $request->reason;
            break;

        case 'hard_rejected':
            $history->title = 'Item Hard Rejected';
            $history->body = $request->reason;
            break;
       }


       $history->save();

       // send mail
       MailSenderService::sendMail(
        name: $item->author->name,
        subject: "$history->title | $item->name",
        content: $history->body,
        toMail: $item->author->email
       );

       NotificationService::UPDATED();

       return redirect()->back();
    }

    function itemDownload(string $id)
    {
        $item = Item::where('id', $id)->firstOrFail();

        if(Storage::disk('local')->exists($item->main_file)) {
            return Storage::disk('local')->download($item->main_file);
        }

        abort(404);
    }

}

