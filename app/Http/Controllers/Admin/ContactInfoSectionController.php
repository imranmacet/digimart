<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactInfoUpdateRequest;
use App\Models\ContactInfoSection;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\NotificationServiceProvider;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ContactInfoSectionController extends Controller implements HasMiddleware
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
        $contact = ContactInfoSection::first();
        return view('admin.sections.contact-section.index', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactInfoUpdateRequest $request, string $id)
    {
        $validatedData = $request->validated();

        ContactInfoSection::updateOrCreate(['id' => 1], $validatedData);

        NotificationService::UPDATED();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
