<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordUpdateRequest;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Services\NotificationService;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUpload;

    function index() : View
    {
        return view('admin.profile.index');
    }

    function update(ProfileUpdateRequest $request) : RedirectResponse
    {
        $user = Auth::guard('admin')->user();
        if($request->hasFile('avatar')) {
            $this->deleteFile($user->avatar);
            $avatarPath = $this->uploadFile($request->file('avatar'));
            $user->avatar = $avatarPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();
    }

    function updatePassword(PasswordUpdateRequest $request) : RedirectResponse
    {
        $user = Auth::guard('admin')->user();
        $user->password = bcrypt($request->password);
        $user->save();

        NotificationService::UPDATED();

        return redirect()->back();
    }
}
