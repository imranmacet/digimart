<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaypalSettingUpdateRequest;
use App\Http\Requests\Admin\RazorpaySettingUpdateRequest;
use App\Http\Requests\Admin\StripeSettingUpdateRequest;
use App\Models\Setting;
use App\Services\NotificationService;
use App\Services\SettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PaymentSettingController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:payment setting')
        ];
    }
    function index() : View
    {
        return view('admin.payment-setting.pages.paypal-setting');     
    }


    function updatePaypalSettings(PaypalSettingUpdateRequest $request) : RedirectResponse
    {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        $setting = app()->make(SettingService::class);
        $setting->clearCashedSettings();

        NotificationService::UPDATED();

        return redirect()->back();
    }


    function stripeSetting() : View
    {
        return view('admin.payment-setting.pages.stripe-setting');     
    }

    function updateStripeSettings(StripeSettingUpdateRequest $request) : RedirectResponse
    {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        $setting = app()->make(SettingService::class);
        $setting->clearCashedSettings();

        NotificationService::UPDATED();

        return redirect()->back();
    }

    function razorpaySetting() : View 
    {
        return view('admin.payment-setting.pages.razorpay-setting');     
    }

    function updateRazorpaySettings(RazorpaySettingUpdateRequest $request) : RedirectResponse
    {
        $validatedData = $request->validated();

        foreach($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        $setting = app()->make(SettingService::class);
        $setting->clearCashedSettings();

        NotificationService::UPDATED();

        return redirect()->back();
    }
}
