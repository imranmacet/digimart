<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WithdrawRequestController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage withdraw request')
        ];
    }
    //
    function index() : View
    {
        $withdrawRequests = Withdraw::paginate(25);
       return view('admin.withdraw-request.index', compact('withdrawRequests'));
    }

    function show(string $id) : View
    {
        $withdrawRequest = Withdraw::findOrFail($id);
        return view('admin.withdraw-request.show', compact('withdrawRequest'));     
    }

    function updateStatus(Request $request, string $id) : RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:pending,paid,rejected']
        ]);

        $withdrawRequest = Withdraw::findOrFail($id);
        $withdrawRequest->status = $request->status;
        $withdrawRequest->save();
        $amount = currencyPosition($withdrawRequest->amount);

        if($withdrawRequest->status == 'paid') {
            $updateBalance = $withdrawRequest->author;
            $updateBalance->balance = $updateBalance->balance - $withdrawRequest->amount;
            $updateBalance->save();

            MailSenderService::sendMail(
                name: $withdrawRequest->author->name,
                toMail: $withdrawRequest->author->email,
                subject: 'Withdrawal Request Approved',
                content: "Your withdrawal request for amount {$amount} has been approved"
            );

        }elseif($withdrawRequest->status == 'rejected') {
            MailSenderService::sendMail(
                name: $withdrawRequest->author->name,
                toMail: $withdrawRequest->author->email,
                subject: 'Withdrawal Request Rejected',
                content: "Your withdrawal request for amount {$amount} has been rejected please try again or contact support"
            );
        }

        NotificationService::UPDATED();
        
        return to_route('admin.withdraw-requests.index');
    }
}
