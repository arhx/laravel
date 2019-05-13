<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
	public function index(){
		$view = view('admin.settings');
		$view->settings = Setting::all();
		return $view;
	}
	public function save(Request $request){
		$settings = Setting::all();
		foreach($settings as $setting){
			$setting->value = $request->input($setting->key);
			$setting->save();
		}

		flash('Settings saved');

		return back();
	}
}
