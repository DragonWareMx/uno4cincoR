<?php

use Illuminate\Database\Seeder;

class imagesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'imagen'=>'contra-los-desordenes-de-la-memoria.jpg',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'contra-este-es-el-manicomio-de-Dios,-Marianela.jpg',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'contra-este-libro-no-habla-de-ti.jpg',
        ]);
        
        DB::table('images')->insert([
            'imagen'=>'cp-estos-poemas-culeros-que-son-lo-menos-culero-que-tengo.jpg',
        ]);

    }
}
