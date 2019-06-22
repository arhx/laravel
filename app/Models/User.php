<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
    	return $this->belongsTo(Role::class);
    }

	public function hasRole($name_or_id, $no_cache = false){
		if(is_numeric($name_or_id)){
			return $this->role_id == $name_or_id;
		}else{
			if($this->exists){
				if($no_cache){
					$role = null;
				}else{
					$role = Cache::get("user.{$this->id}.role");
				}
				if(!$role){
					$role = $this->role;
					Cache::put("user.{$this->id}.role",$role,now()->addMinutes(10));
				}
			}else{
				$role = $this->role;
			}
			return optional($role)->name == $name_or_id;
		}
	}
}
