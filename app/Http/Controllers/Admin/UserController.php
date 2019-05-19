<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserSaveRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
    	return redirect()->route('admin-users');
    }
    public function users(){
    	$view = view('admin.users.index');
    	$view->users = User::latest()->with('role')->paginate(20);
    	return $view;
    }
    public function create(){
    	$user = new User();
    	$user->role_id = Role::ID_USER;

	    $view = view('admin.users.form');
	    $view->user = $user;
	    $view->roles = Role::orderBy('id')->get();
	    return $view;
    }
    public function edit($id){
	    $view = view('admin.users.form');
	    $view->user = User::findOrFail($id);
	    $view->roles = Role::orderBy('id')->get();
	    return $view;
    }
    public function delete($id){
	    $user = User::findOrFail($id);
	    $user->delete();

	    flash('User deleted');

	    return back();
    }
    public function save(UserSaveRequest $request){
		if($request->id){
			$user = User::findOrFail($request->id);
		}else{
			$user = new User();
		}
		$user->fill($request->except('password'));
		$user->role_id = $request->role_id;
		if($request->password){
			$user->password = \Hash::make($request->password);
		}
		$user->save();

		flash('User saved');

		return back();
    }
}
