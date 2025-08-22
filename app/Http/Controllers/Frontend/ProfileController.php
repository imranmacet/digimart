<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\AuthorWithdrawInformation;
use App\Models\User;
use App\Models\WithdrawMethod;
use App\Services\NotificationService;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUpload;

    function  index() : View
    {
        $user = Auth::user();
        $withdrawMethods = WithdrawMethod::whereStatus(1)->get();
        return view('frontend.dashboard.profile.index', compact('user', 'withdrawMethods'));
    }

    function update(ProfileUpdateRequest $request) : RedirectResponse
    {

        $user = Auth::user();
        if($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->avatar);
            $user->avatar = $avatarPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();

    }


    function updatePassword(PasswordUpdateRequest $request) : RedirectResponse{
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();
    }

    function withdrawInfo(Request $request) : RedirectResponse 
    {
        $request->validate([
            'payout_method' => ['required', 'exists:withdraw_methods,id'],
            'information' => ['required']
        ]);

        AuthorWithdrawInformation::updateOrCreate(
            ['author_id' => user()->id],
            [
                'withdraw_method_id' => $request->payout_method,
                'information' => $request->information
            ]
        );

            NotificationService::UPDATED();

        return redirect()->back();
    }
}
