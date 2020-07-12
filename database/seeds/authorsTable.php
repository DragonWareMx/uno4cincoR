<?php

use Illuminate\Database\Seeder;

class authorsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'nombre'=>'Aless Segovia',
            'descripcion'=>'Autor de campeche',
            'foto'=>'autor.jpg'

            ]);
        DB::table('authors')->insert([
                'nombre'=>'Estefanía Licea',
                'descripcion'=>'Autora de Toluca',
                'foto'=>'autor.jpg'
                
        ]);
        DB::table('authors')->insert([
            'nombre'=>'César Jordán',
            'descripcion'=>'Autor de Nayarit',
            'foto'=>'autor.jpg'
           
        ]);
        DB::table('authors')->insert([
            'nombre'=>'José Agustín Solórzano',
            'descripcion'=>'Autor de Michoacán',
            'foto'=>'autor.jpg'
            
            ]);
    }
}
