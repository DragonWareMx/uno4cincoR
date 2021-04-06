<?php

use Illuminate\Database\Seeder;

class booksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'titulo'=>'Desórdenes de la memoria',
            'numEdicion'=>'1',
            'precioFisico'=>'200',
            'precioDigital'=>'100',
            'descuentoFisico'=>'0',
            'descuentoDigital'=>'0',
            'sinopsis'=>'Desordenada la palabra, muerta, se florece para no ser vista, ni escuchada, sólo dicha, 
            como eco de las tardes en que nada es acerca de seguir. Aless Segovia en este libro, como piedara, como llanto,
             como memoria del olvido que aún queda por venir.',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'Ebook Los desordenes de la memoria.pdf',
            'portadaImagen'=>'Portada-mockup-Aless.png',
            'bannerImagen'=>'aless.png',
            'tiendaImagen'=>'portada-líbroAless.png',
            'fechaPublicacion'=>'2020-08-06',
            'nuevo'=>1,
            'sello_id'=>'1',
            'paginas'=>'100'
        ]);
        
        DB::table('books')->insert([
            'titulo'=>'Este es el manicomio de Dios, Marianela',
            'numEdicion'=>'1',
            'precioFisico'=>'200',
            'precioDigital'=>'100',
            'descuentoFisico'=>'0',
            'descuentoDigital'=>'0',
            'sinopsis'=>'Estefanía Licea se presenta a través de la tormenta que son sus poemas, este, su primer libro que, 
            sin pretender ser desde la concepción algo más que lo que es: la diaria búsqueda del amor en todas sus formas de vida; 
            se convierte, por mérito propio, en una voz para todas, las que siguen y las que fueron arrancadas, para ti, para mí, 
            Marianela, que abres tus manos y vuelas.',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'Ebook Estes es el manicomio de Dios, Marianela - Estefania Licea.pdf',
            'portadaImagen'=>'Portada mockup Estefania.png',
            'bannerImagen'=>'estefania.png',
            'tiendaImagen'=>'portada-líbro-2Esteffania.png',
            'fechaPublicacion'=>'2020-08-05',
            'nuevo'=>1,
            'sello_id'=>'1',
            'paginas'=>'100'
        ]);
        
        DB::table('books')->insert([
            'titulo'=>'Este libro no habla de ti',
            'numEdicion'=>'1',
            'precioFisico'=>'200',
            'precioDigital'=>'100',
            'descuentoFisico'=>'0',
            'descuentoDigital'=>'0',
            'sinopsis'=>'uno escribe de lo que le duele y lee desde lo que necesita. este libro ya no es acerca de los dos',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'ebook Este libro no habla de ti - Cesar Jordan.pdf',
            'linkDemo'=>'promo Este libro no habla de ti - Cesar Jordan.pdf',
            'portadaImagen'=>'Portada-mockup-jordan.png',
            'bannerImagen'=>'cesar.png',
            'tiendaImagen'=>'portada-líbro-Jordan.png',
            'fechaPublicacion'=>'2020-08-08',
            'nuevo'=>1,
            'sello_id'=>'1',
            'paginas'=>'100'
        ]);
        
        DB::table('books')->insert([
            'titulo'=>'Estos poemas culeros que son lo menos culero que tengo',
            'numEdicion'=>'1',
            'precioFisico'=>'200',
            'precioDigital'=>'100',
            'descuentoFisico'=>'0',
            'descuentoDigital'=>'0',
            'sinopsis'=>'Solórzano propone una colección de poemas que no tienen compromiso con nadie, 
                        que nacieron en una brillante y oscura libertad al mismo tiempo. Quien se asoma a  
                        su literatura lo hace buscando todo, menos salir ileso.',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'Ebook Estos poemas culeros que son lo menos culero que tengo.pdf',
            'linkDemo'=>'Promo Estos poemas culeros que son lo menos culero que tengo.pdf',
            'portadaImagen'=>'portada-líbro-Agus.png',
            'bannerImagen'=>'agustin.png',
            'tiendaImagen'=>'Portada-mockup-Agustín.png',
            'fechaPublicacion'=>'2020-08-08',
            'nuevo'=>1,
            'sello_id'=>'1',
            'paginas'=>'100'
        ]);
    }
}
