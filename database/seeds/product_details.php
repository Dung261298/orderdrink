<?php

use Illuminate\Database\Seeder;

class product_details extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_details')->insert([
        	'product_id'=>'1',
        	'size'=>'L',
        	'price'=>'100',
        	'isdelete'=>false,
        	'isdisplay'=>true,
        ]);
        DB::table('product_details')->insert([
        	'product_id'=>'2',
        	'size'=>'L',
        	'price'=>'300',
        	'isdelete'=>false,
        	'isdisplay'=>true,
        ]);
        DB::table('product_details')->insert([
        	'product_id'=>'3',
        	'size'=>'M',
        	'price'=>'800',
        	'isdelete'=>false,
        	'isdisplay'=>true,
        ]);
    }
}
