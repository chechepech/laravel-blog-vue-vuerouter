<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Events\UserWasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::allowed()->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = Role::pluck('name', 'id');
        $user = new User;
        $this->authorize('create', $user);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.create', compact('user','roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Policy Users
        $this->authorize('create', new User);

        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users'
        ]);

        //Generate a random password
        $fields['password'] = Str::random(8);
        //Create a user
        $user=User::create($fields);
        //Assign role to the user
        if($request->filled('roles')){

            $user->assignRole($request->roles);
        }
        //Assign permission to the user
        if($request->filled('permissions')){

            $user->givePermissionTo($request->permissions);
        }

        //Send Email
        UserWasCreated::dispatch($user, $fields['password']);
        //chapter 63
        return redirect()->route('admin.users.index')->withFlash('User created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //Policy Users
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //Policy Users
        $this->authorize('update',$user);
        //$roles = Role::pluck('name', 'id');
        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name', 'id');
        return view('admin.users.edit', compact('user','roles','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update',$user);

       $user->update($request->validated());
        return redirect()->route('admin.users.edit', $user)->withFlash('User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')->withFlash('User deleted successfully!');
    }
}
