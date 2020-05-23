<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserPermissionController extends Controller
{
    public function update(Request $request, User $user){
    	/*-- Data processing --*/
        //decline duplicated roles
       // $user->syncPermissions($request->permissions);
    	$user->permissions()->detach();
    	if($request->filled('permissions')){
    		$user->givePermissionTo($request->permissions);
    	}
        return back()->withFlash('Permissions updated successfully');
    }
}
