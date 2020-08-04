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
            'sinopsis'=>'**',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'desordenes.txt',
            'portadaImagen'=>'alessC.JPG',
            'bannerImagen'=>'aless.PNG',
            'tiendaImagen'=>'alessC.JPG',
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
            'sinopsis'=>'***',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'manicomio.txt',
            'portadaImagen'=>'estefaniaC.JPG',
            'bannerImagen'=>'estefania.PNG',
            'tiendaImagen'=>'estefaniaC.JPG',
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
            'sinopsis'=>'***',
            'stockFisico'=>'100',
            'stockDigital'=>'1',
            'linkDescarga'=>'jordan.txt',
            'portadaImagen'=>'cesarC.JPG',
            'bannerImagen'=>'cesar.PNG',
            'tiendaImagen'=>'cesarC.JPG',
            'fechaPublicacion'=>'2020-08-07',
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
            'stockFisico'=>'79',
            'stockDigital'=>'1',
            'linkDescarga'=>'agustin.txt',
            'portadaImagen'=>'agustinC.JPG',
            'bannerImagen'=>'agustin.PNG',
            'tiendaImagen'=>'agustinC.JPG',
            'fechaPublicacion'=>'2020-08-08',
            'nuevo'=>1,
            'sello_id'=>'1',
            'paginas'=>'100'
        ]);
    }
}
