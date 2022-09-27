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
        DB::table('genres')->insert([
            'nombre'=>'Booke Selecto',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Negocios',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'MTG singles',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Witch Tok',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Fantasía',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Formato',
            'descripcion'=>'',
        ]);
        DB::table('genres')->insert([
            'nombre'=>'Audio libro',
            'descripcion'=>'',
        ]);
    }
}
