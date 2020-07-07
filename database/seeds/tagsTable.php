<?php

use Illuminate\Database\Seeder;

class tagsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'nombre'=>'Cuarentena'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'Covid-19'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'NoEraPenal'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'AgustínAguilar'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'uno4cinco'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'Tecnología'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'Viledruid'
        ]);
    }
}
