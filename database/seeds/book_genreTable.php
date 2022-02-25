<?php

use Illuminate\Database\Seeder;

class book_genreTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_genre')->insert([
            'book_id'=>'1',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'2',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'3',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'4',
            'genre_id'=>'1',
        ]);

        DB::table('book_genre')->insert([
            'book_id'=>'5',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'6',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'7',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'8',
            'genre_id'=>'1',
        ]);

        DB::table('book_genre')->insert([
            'book_id'=>'9',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'10',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'11',
            'genre_id'=>'1',
        ]);
        
        DB::table('book_genre')->insert([
            'book_id'=>'12',
            'genre_id'=>'1',
        ]);
    }
}
