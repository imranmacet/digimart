<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\MonthlyPickProduct;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MonthlyPickProductsController extends Controller implements HasMiddleware
{

    static function Middleware() : array
    {
        return [
            new Middleware('permission:manage sections')
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $monthlyPickedSection = MonthlyPickProduct::first();
        $selectedProducts = Item::select(['id', 'name'])->whereIn('id', $monthlyPickedSection?->item_ids ?? [])->get();
        return view('admin.sections.monthly-picked-product.index', compact('monthlyPickedSection', 'selectedProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'content' => ['required', 'string', 'max:255'],
            'monthly_picked_items' => ['required', 'array']
        ]);

        MonthlyPickProduct::updateOrCreate(
            ['id' => 1],
            [
                'title' => $request->title,
                'content' => $request->content,
                'item_ids' => $request->monthly_picked_items
            ]
        );

        NotificationService::UPDATED();

        return back();
    }

}
