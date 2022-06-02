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
            'nombre'=>'Booke Wellness',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Novela',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Poesía',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Ensayo',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Investigación',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Religión',
            'descripcion'=>'',
        ]);
    }
}
