<?php

use Illuminate\Database\Seeder;

class genresTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'nombre'=>'poesía',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'cuento',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'ensayo',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'novela',
            'descripcion'=>'',
        ]);
    }
}
