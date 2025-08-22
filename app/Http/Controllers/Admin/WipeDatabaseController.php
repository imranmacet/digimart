<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class WipeDatabaseController extends Controller
{
    //

    function index() : View
    {
        return view('admin.wipe-database.index');
    }

    function destroy() {
        try{
         // Wipe Database
         Artisan::call('migrate:fresh --seed');

         return response()->json([
             'status' => 'success',
             'message' => 'Database wiped successfully'
         ]);
        }
        catch(\Exception $e) {
         logger($e);
            throw $e;
        }
    }
}
