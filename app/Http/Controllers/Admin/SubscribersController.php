<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Redirect;

class SubscribersController extends Controller implements HasMiddleware
{

    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage newsletter')
        ];
    }

    function index(): View
    {
        $subscribers = Subscription::latest()->paginate(25);
        return view('admin.subscriber.index', compact('subscribers'));
    }

    function sendNewsletter(Request $request) : RedirectResponse
    {

        $request->validate([
            'subject' => ['required'],
            'message' => ['required']
        ]);

        $emails = Subscription::pluck('email')->toArray();

        MailSenderService::sendBulkNewsletterMail($request->subject, $request->message, $emails);

        NotificationService::CREATED('Newsletter sent successfully');

        return back();
    }

    function destroy(Subscription $subscriber): JsonResponse
    {
        try {

            $subscriber->delete();

            NotificationService::DELETED();
            return response()->json(['status' => 'success', 'message' => __('Delete successfully')], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
