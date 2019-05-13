<?php
function flash($msg, $type = 'success'){
	Session::flash( 'flash_msg', __( $msg ) );
	Session::flash( 'flash_type', $type );
}

function money($value, $char = '.'){
	return number_format($value, 2, $char, ' ');
}
function settings($key,$default = null){
	static $data;
	if(is_null($data)){
		$data = \App\Models\Setting::all()->pluck('key','value')->toArray();
	}
	return Arr::get($data,$key,$default);
}
function _floor($number,$decimals){
	$mul = 10 ** $decimals;
	$number = floor($number * $mul) / $mul;
	return round($number,$decimals);
}

function route_active($route_name, $active_class = 'active'){
	$name = Route::currentRouteName();
	$route_name = Arr::wrap($route_name);
	return in_array($name,$route_name) ? $active_class : null;
}
function attr_selected($bool){
	return $bool ? 'selected' : null;
}
function attr_required($bool){
	return $bool ? 'required' : null;
}
function attr_checked($bool){
	return $bool ? 'checked' : null;
}
function display_size($size){
	$units = ['B','K','M','G'];
	$unit_idx = 0;
	while($size > 1024 && isset($units[$unit_idx+1])){
		$size /= 1024;
		$unit_idx++;
	}
	return round($size,2).' '.$units[$unit_idx];
}