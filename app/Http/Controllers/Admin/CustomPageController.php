<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomPageStoreRequest;
use App\Http\Requests\Admin\CustomPageUpdateRequest;
use App\Models\CustomPage;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CustomPageController extends Controller implements HasMiddleware
{

    static function Middleware() : array
    {
        return [
            new Middleware('permission:page builder')
        ];
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $pages = CustomPage::all();
        return view('admin.custom-page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.custom-page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomPageStoreRequest $request) : RedirectResponse
    {
        $page = new CustomPage();
        $page->name = $request->name;
        $page->content = $request->content;
        $page->show_at_nav = $request->show_at_nav;
        $page->status = $request->status;
        $page->save();

        NotificationService::CREATED();

        return redirect()->route('admin.custom-page.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomPage $customPage) : View
    {
        return view('admin.custom-page.edit', compact('customPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomPageUpdateRequest $request, string $id)
    {
        $page = CustomPage::findOrFail($id);
        $page->name = $request->name;
        $page->content = $request->content;
        $page->show_at_nav = $request->show_at_nav;
        $page->status = $request->status;
        $page->save();

        NotificationService::CREATED();

        return redirect()->route('admin.custom-page.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomPage $customPage)
    {
        try {

            $customPage->delete();

            NotificationService::DELETED();
            return response()->json(['status' => 'success', 'message' => __('Delete successfully')], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
