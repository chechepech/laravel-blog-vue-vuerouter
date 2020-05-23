<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
	public function index(){

		$this->authorize('view', new Permission);

    	return view('admin.permissions.index',[
    		'permissions' => Permission::all()
    	]);
	}

	public function edit(Permission $permission){
		$this->authorize('update', $permission);
		return view('admin.permissions.edit', ['permission' => $permission]);
	}

	public function update(Request $request, Permission $permission){
		$this->authorize('update', $permission);
		$field = $request->validate(['display_name' => 'required']);
		$permission->update($field);
		return redirect()->route('admin.permissions.edit',$permission)->withFlash('Permission has been succesfully updated!');
	}

}
