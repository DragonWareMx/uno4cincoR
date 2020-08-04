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
            'nombre'=>'Eventos'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'Articulos'
        ]);
        DB::table('tags')->insert([
            'nombre'=>'Noticias'
        ]);
    }
}
