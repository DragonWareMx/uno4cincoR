<?php

use Illuminate\Database\Seeder;

class bannersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'tipo'=>'autor',
            'imagenPC'=>'Aless.jpg',
            'imagenCell'=>'Aless-vertical.jpg',
            'boton'=>'',
            'link'=>'http://uno4cinco.com/registro',
            'idRelacion'=>'1',
            ]);
            
            DB::table('banners')->insert([
                'tipo'=>'autor',
                'imagenPC'=>'Estefania.jpg',
                'imagenCell'=>'Estefania-vertical.jpg',
                'boton'=>'',
                'link'=>'http://uno4cinco.com/registro',
                'idRelacion'=>'2',
                ]);
            DB::table('banners')->insert([
                    'tipo'=>'autor',
                    'imagenPC'=>'Jordán.jpg',
                    'imagenCell'=>'Jordán-vertical.jpg',
                    'boton'=>'',
                    'link'=>'http://uno4cinco.com/registro',
                    'idRelacion'=>'3',
            ]);
            DB::table('banners')->insert([
                'tipo'=>'autor',
                'imagenPC'=>'José.jpg',
                'imagenCell'=>'José-vertical.jpg',
                'boton'=>'',
                'link'=>'http://uno4cinco.com/registro',
                'idRelacion'=>'4',
            ]);
            DB::table('banners')->insert([
                'tipo'=>'libro',
                'imagenPC'=>'Aless-libro.jpg',
                'imagenCell'=>'Aless-libro-vertical.jpg',
                'boton'=>'',
                'link'=>'http://uno4cinco.com/registro',
                'idRelacion'=>'1',
                ]);
            DB::table('banners')->insert([
                    'tipo'=>'libro',
                    'imagenPC'=>'Estefania-libro.jpg',
                    'imagenCell'=>'Estefania-libro-vertical.jpg',
                    'boton'=>'',
                    'link'=>'http://uno4cinco.com/registro',
                    'idRelacion'=>'2',
            ]);
            DB::table('banners')->insert([
                'tipo'=>'libro',
                'imagenPC'=>'Jordán-libro.jpg',
                'imagenCell'=>'Jordán-libro-vertical.jpg',
                'boton'=>'',
                'link'=>'http://uno4cinco.com/registro',
                'idRelacion'=>'3',
            ]);
            DB::table('banners')->insert([
                'tipo'=>'libro',
                'imagenPC'=>'José-libro.jpg',
                'imagenCell'=>'José-libro-vertical.jpg',
                'boton'=>'',
                'link'=>'http://uno4cinco.com/registro',
                'idRelacion'=>'4',
                ]);
           
    }

}
