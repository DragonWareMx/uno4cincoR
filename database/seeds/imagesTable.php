<?php

use Illuminate\Database\Seeder;

class imagesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'imagen'=>'aless.png',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'estefania.png',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'cesar.png',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'agustin.png',
        ]);
    }
}
