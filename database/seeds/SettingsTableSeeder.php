<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,5) as $i){
        	Setting::create([
        		'key' => "key-$i",
		        'value' => "value-$i"
	        ]);
        }
    }
}
