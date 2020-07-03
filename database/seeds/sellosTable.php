<?php

use Illuminate\Database\Seeder;

class sellosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellos')->insert([
            'nombre'=>'uno4cinco',
        ]);
        
        DB::table('sellos')->insert([
            'nombre'=>'145',
        ]);
    }
}
