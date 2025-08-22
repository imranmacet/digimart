<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FlashSaleBannerUpdateRequest;
use App\Models\FlashSaleBanner;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FlashSaleBannerController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage banner')
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $banner = FlashSaleBanner::first();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlashSaleBannerUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();
        FlashSaleBanner::updateOrCreate(['id' => $id], $validatedData);
        NotificationService::UPDATED();

        return back();
    }
}
