<?php

use Illuminate\Database\Seeder;

class book_imageTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_image')->insert([
            'book_id'=>'1',
            'image_id'=>'1',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'2',
            'image_id'=>'2',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'3',
            'image_id'=>'3',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'4',
            'image_id'=>'4',
        ]);
    }
}
