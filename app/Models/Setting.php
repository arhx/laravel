<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Crypt;

class Setting extends Model
{
	protected $primaryKey = 'key';
    protected $fillable = [
		'key',
		'value',
    ];
	public $incrementing = false;

	protected $crypted = [

    ];
    public function getValueAttribute($value){
	    if(in_array($this->key,$this->crypted)){
		    $value = Crypt::decryptString($value);
	    }
    	return $value;
    }
    public function setValueAttribute($value){
    	if(in_array($this->key,$this->crypted)){
		    $value = Crypt::encryptString($value);
	    }
	    $this->attributes['value'] = $value;
    }
}
