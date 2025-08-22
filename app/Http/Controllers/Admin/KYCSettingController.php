<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KycSettingUpdateRequest;
use App\Models\KycSetting;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class KYCSettingController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage kyc')
        ];
    }
    
    function index() : View
    {
        $kycSetting = KycSetting::first();
        return view('admin.kyc.kyc-setting.index', compact('kycSetting'));
    }

    function update(KycSettingUpdateRequest $request) : RedirectResponse
    {
        KycSetting::updateOrCreate(
            ['id' => 1],
            $request->validated()
        );

        NotificationService::UPDATED();

        return redirect()->back();
    }
}
