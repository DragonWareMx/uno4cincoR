<?php

use Illuminate\Database\Seeder;

class userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Dragon Ware',
            'email' => 'DragonWareOficial@hotmail.com',
            'password' => bcrypt('viledruid9000')
        ]);
        DB::table('users')->insert([
            'name' => 'Alex Ramírez',
            'email' => 'alexsiegart@gmail.com',
            'password' => bcrypt('Password123')
        ]);
    }
}