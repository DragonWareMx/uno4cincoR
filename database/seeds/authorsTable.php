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
            'descripcion'=>'Autor de campeche. Lorem ipsum dolor sit amet consectetur adipiscing, elit rutrum 
            nam odio quis nascetur sociis, etiam fringilla auctor nullam lobortis. Metus suspendisse fames 
            taciti rhoncus est risus velit nisi senectus, rutrum ad ut euismod et justo curae tincidunt orci, 
            nibh sapien condimentum litora fusce viverra eleifend eros. Class mus aliquam leo eu etiam elementum 
            at eros risus sollicitudin est proin phasellus bibendum, tristique sed ac nostra odio porttitor a vel 
            inceptos ad magna duis mauris.

            Egestas malesuada accumsan aenean dui montes eleifend diam augue maecenas, lectus viverra ultrices 
            vivamus vulputate per fames purus. Facilisi turpis nam ligula suspendisse hac sollicitudin libero 
            at, nec magna quis ut nulla posuere enim hendrerit vitae, nullam vivamus sem dapibus tempus sed luctus. 
            Faucibus justo enim at porta eget sem proin fermentum, sociosqu purus parturient dui aliquet curae.',
            'foto'=>'autor.jpg',
            'fechaNac'=>'1990-01-01'

            ]);
        DB::table('authors')->insert([
                'nombre'=>'Estefanía Licea',
                'descripcion'=>'Autora de Toluca. Lorem ipsum dolor sit amet consectetur adipiscing, elit rutrum 
                nam odio quis nascetur sociis, etiam fringilla auctor nullam lobortis. Metus suspendisse fames 
                taciti rhoncus est risus velit nisi senectus, rutrum ad ut euismod et justo curae tincidunt orci, 
                nibh sapien condimentum litora fusce viverra eleifend eros. Class mus aliquam leo eu etiam elementum 
                at eros risus sollicitudin est proin phasellus bibendum, tristique sed ac nostra odio porttitor a vel 
                inceptos ad magna duis mauris.
    
                Egestas malesuada accumsan aenean dui montes eleifend diam augue maecenas, lectus viverra ultrices 
                vivamus vulputate per fames purus. Facilisi turpis nam ligula suspendisse hac sollicitudin libero 
                at, nec magna quis ut nulla posuere enim hendrerit vitae, nullam vivamus sem dapibus tempus sed luctus. 
                Faucibus justo enim at porta eget sem proin fermentum, sociosqu purus parturient dui aliquet curae.',
                'foto'=>'autor.jpg',
                'fechaNac'=>'1990-01-01'
                
        ]);
        DB::table('authors')->insert([
            'nombre'=>'César Jordán',
            'descripcion'=>'Autor de Nayarit. Lorem ipsum dolor sit amet consectetur adipiscing, elit rutrum 
            nam odio quis nascetur sociis, etiam fringilla auctor nullam lobortis. Metus suspendisse fames 
            taciti rhoncus est risus velit nisi senectus, rutrum ad ut euismod et justo curae tincidunt orci, 
            nibh sapien condimentum litora fusce viverra eleifend eros. Class mus aliquam leo eu etiam elementum 
            at eros risus sollicitudin est proin phasellus bibendum, tristique sed ac nostra odio porttitor a vel 
            inceptos ad magna duis mauris.

            Egestas malesuada accumsan aenean dui montes eleifend diam augue maecenas, lectus viverra ultrices 
            vivamus vulputate per fames purus. Facilisi turpis nam ligula suspendisse hac sollicitudin libero 
            at, nec magna quis ut nulla posuere enim hendrerit vitae, nullam vivamus sem dapibus tempus sed luctus. 
            Faucibus justo enim at porta eget sem proin fermentum, sociosqu purus parturient dui aliquet curae.',
            'foto'=>'autor.jpg',
            'fechaNac'=>'1990-01-01'
           
        ]);
        DB::table('authors')->insert([
            'nombre'=>'José Agustín Solórzano',
            'descripcion'=>'Nació en Valle de Santiago, Guanajuato, en 1987. Es miembro de la Sociedad 
            de Escritores Michoacanos y autor de los libros de poesía Ni las flores del mal ni las flores 
            del bien (Premio Estatal de Poesía Carlos Eduardo Turón; SECUM, 2015), Monomanía del autómata 
            (FETA, 2014), Alguien ha salido a buscarme (Diablura, 2012) y Versos, moscas y poetas (Premio 
            Michoacán Ópera Prima; SECUM, 2009). También es autor de la novela Rompecabezas (FOEM, 2015). 
            En 2015 obtuvo el Premio Regional de Literatura para Niñas y Niños del Instituto de Cultura de 
            Guanajuato. En 2012 fue becario del Programa de Estímulos a la Creación y al Desarrollo Artístico 
            de Michoacán (PECDAM). Actualmente escribe la columna semanal “Notas al margen” en el diario Página 
            24, de Jalisco, y en el suplemento La Gualdra, de La Jornada Zacatecas.',
            'foto'=>'autor.jpg',
            'fechaNac'=>'1990-01-01'
            
            ]);
    }
}
