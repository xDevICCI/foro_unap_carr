<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        		'name'=>'admin',
        		'email'=>'admin@admin.dev',
        		'password'=>bcrypt('secret'),
        		'role'=>1,
        		'points'=>5,
        ]);

        App\Profile::create([
        	'user_id'=>$user->id,
        	'avatar'=>'https://www.shareicon.net/download/2015/09/24/106420_man_512x512.png',
        	'description'=>'l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de tex',
        	'ip'=>'127.0.0.1'
        ]);
    }
}
