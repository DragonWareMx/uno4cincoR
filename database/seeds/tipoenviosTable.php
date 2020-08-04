<?php

use Illuminate\Database\Seeder;

class tipoenviosTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipoenvios')->insert([
            'nombre'=>'Tradicional',
            'descripcion'=>'7 días',
            'costo'=>'90'
        ]);
        DB::table('tipoenvios')->insert([
            'nombre'=>'Express',
            'descripcion'=>'2 o 3 días',
            'costo'=>'130'
        ]);
    }
}
