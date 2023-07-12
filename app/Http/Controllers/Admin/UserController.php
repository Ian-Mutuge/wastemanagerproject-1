<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(){
        $users=User::all();

        return view('admin.users.index',compact('users'));
    }
    public function show(User $user){
        $roles=Role::all();
        $permissions=Permission::all();

        return view('admin.users.role',compact('user','roles','permissions'));
    }
        public function assignRole(Request $request,User $user){
  if($user->hasRole($request->role)){
    return back()->with('message','Role exists');
}
   $user->assignRole($request->role);
   return back()->with('message','Role Assign');
   }
    public function removeRole(User $user,Role $role){
  if($user->hasRole($role)){
      $user->removeRole($role);
    return back()->with('message','Role Removed');
}
return back()-with('message','Role not exists');
   }
    public function givePermission(Request $request,User $user){
  if($user->hasPermissionTo($request->permission)){
    return back()->with('message','Permission exists');
}
   $user->givePermissionTo($request->permission);
   return back()->with('message','Permission added');
   }
   public function revokePermission(User $user,Permission $permission){
  if($user->hasPermissionTo($permission)){
      $user->revokePermissionTo($permission);
    return back()->with('message','Permission revoked');
}
return back()-with('message','Permission does not exists');
   }
}