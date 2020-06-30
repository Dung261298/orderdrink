<?php

use Illuminate\Database\Seeder;

class permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	'name'=>'create_user',
        	'label'=>'Create user',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'edit_user',
        	'label'=>'Edit user',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'view_user',
        	'label'=>'View user',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'detail_user',
        	'label'=>'Detail user',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'create_about',
        	'label'=>'Create about',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'edit_about',
        	'label'=>'Edit about',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'view_about',
        	'label'=>'View about',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'detail_about',
        	'label'=>'Detail about',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'create_brand',
        	'label'=>'Create brand',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'edit_brand',
        	'label'=>'Edit brand',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'view_brand',
        	'label'=>'View brand',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'detail_brand',
        	'label'=>'Detail brand',
        ]);

        DB::table('permissions')->insert([
        	'name'=>'create_category',
        	'label'=>'Create category',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'edit_category',
        	'label'=>'Edit category',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'view_category',
        	'label'=>'View category',
        ]);
        DB::table('permissions')->insert([
        	'name'=>'detail_category',
        	'label'=>'Detail category',
        ]);
        

    }
}
