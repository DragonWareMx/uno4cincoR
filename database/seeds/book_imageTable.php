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

        DB::table('book_image')->insert([
            'book_id'=>'5',
            'image_id'=>'1',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'6',
            'image_id'=>'2',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'7',
            'image_id'=>'3',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'8',
            'image_id'=>'4',
        ]);

        DB::table('book_image')->insert([
            'book_id'=>'9',
            'image_id'=>'1',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'10',
            'image_id'=>'2',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'11',
            'image_id'=>'3',
        ]);
        DB::table('book_image')->insert([
            'book_id'=>'12',
            'image_id'=>'4',
        ]);
     
    }
}
