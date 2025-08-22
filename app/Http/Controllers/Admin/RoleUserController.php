<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleUserStoreRequest;
use App\Http\Requests\Admin\RoleUserUpdateRequest;
use App\Models\Admin;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller implements HasMiddleware
{
    static function Middleware() : array
    {
        return [
            new Middleware('permission:access management')
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $admins = Admin::all();
        return view('admin.access-management.role-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $roles = Role::all();
        return view('admin.access-management.role-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserStoreRequest $request) : RedirectResponse
    {
       $admin = new Admin();
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->password = bcrypt($request->password);
       $admin->save();

       // Assign role to user
       $admin->assignRole($request->role);

       NotificationService::CREATED();

       return to_route('admin.role-users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $role_user) : View|RedirectResponse
    {
        if($role_user->roles()->first()?->name === 'super admin') {
            NotificationService::ERROR();
            return redirect()->back();
        }

        $roles = Role::all();
        $admin = $role_user;
        return view('admin.access-management.role-user.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserUpdateRequest $request, Admin $role_user) : RedirectResponse
    {
        if($role_user->roles()->first()?->name === 'super admin') {
            NotificationService::ERROR();
            return redirect()->back();
        }

        $admin = $role_user;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->has('password') && $request->filled('password')) $admin->password = bcrypt($request->password);
        $admin->save();

        // Assign role to user
        $admin->assignRole($request->role);

        NotificationService::UPDATED();

        return to_route('admin.role-users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $role_user) : JsonResponse
    {
        if($role_user->roles()->first()?->name === 'super admin') {
            NotificationService::ERROR();
            return response()->json(['status' => 'error', 'message' => __('You cannot delete this user')], 400);
        }

        try {
        // remove role from user
        foreach($role_user->getRoleNames() as $role) {
            $role_user->removeRole($role);
        }

        $role_user->delete();

        NotificationService::DELETED();

        return response()->json(['status' => 'success', 'message' => __('Role User deleted successfully')]);

        } catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
