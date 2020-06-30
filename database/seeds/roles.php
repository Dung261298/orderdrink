<?php

use Illuminate\Database\Seeder;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name'=>'Client',
        	'label'=>'client'
        ]);
        DB::table('roles')->insert([
        	'name'=>'SuperAdmin',
        	'label'=>'superAdmin'
        ]);
    }
}
