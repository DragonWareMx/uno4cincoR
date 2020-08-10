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
            'descripcion'=>'Pomuch, Campeche.  
                        Co-autor del libro de cuentos "Voces de la Ceiba" y del compilado sobre la narrativa de Julio Cortázar "Queremos tanto a Julio". 
                        Antologado en el mapa poético nacional "Parkour pop.ético"  de la Secretaría de Educación Pública. Ha sido ganador del concurso 
                        de poesía joven del estado de Campeche en 2019 y del concurso convocado por la editorial Lumpérica Cartonera (Lima,Perú) en ese mismo año.',
            'foto'=>'fotoAless2.jpg',
            'fotoPerfil'=>'fotoAless.jpg',
            'fechaNac'=>'1992-10-17'

            ]);
        DB::table('authors')->insert([
                'nombre'=>'Estefanía Licea',
                'descripcion'=>'Autora de Toluca estado de México.',
                'foto'=>'fotoLicea2.jpg',
                'fotoPerfil'=>'fotoLicea.jpg',
                'fechaNac'=>'1988-11-25'
                
        ]);
        DB::table('authors')->insert([
            'nombre'=>'César Jordán',
            'descripcion'=>'Autor de Nayarit.',
            'foto'=>'fotoJordan2.jpg',
            'fotoPerfil'=>'fotoJordan.jpg',
            'fechaNac'=>'1990-11-12'
           
        ]);
        DB::table('authors')->insert([
            'nombre'=>'José Agustín Solórzano',
            'descripcion'=>'Es autor de varios libros de poesía, entre los que destacan “Dos versiones del libro que no escribí” 
                    (Abismos, 2017), “Ni las flores del mal ni las flores del bien” (Premio de Poesía Carlos Eduardo Turón; Secum, 2015) y 
                    “Monomanía del autómata” (FETA, 2014). También es autor de “Cuaderno de ensayo” (Premio de Ensayo María Zambrano; Secum, 2017) 
                    y de las novelas “Ciudad en blanco” (SECUM, 2019) y “Rompecabezas” (FOEM, 2015).',
            'foto'=>'fotoAgustin2.jpg',
            'fotoPerfil'=>'fotoAgustin.jpg',
            'fechaNac'=>'1987-08-07'
            ]);
    }
}
