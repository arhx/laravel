<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileSaveRequest;
use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function index(){
    	$view = view('profile.index');
    	$view->user = Auth::user();
    	return $view;
    }
    public function save(ProfileSaveRequest $request){
    	$user = Auth::user();
    	$user->name = $request->name;
    	if($request->password){
    		$user->password = Hash::make($request->password);
	    }
	    $user->save();

    	flash('Profile saved');
    	return back();
    }
}
