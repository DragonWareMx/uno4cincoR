<?php

use Illuminate\Database\Seeder;

class blogsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'titulo'=>'Lorem Ipsum',
            'imagen'=>'banner_blogs.jpg',
            'contenido'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor et dui eget euismod. 
                        Vivamus ullamcorper facilisis pellentesque. Aliquam lobortis nisi consectetur ex hendrerit, ut 
                        finibus ipsum condimentum. Vivamus nibh neque, faucibus id ante at, molestie tempus tellus. Donec non 
                        rhoncus metus. Fusce ornare urna sagittis, iaculis dui non, blandit dolor. Praesent neque ex, posuere at 
                        ultricies nec, mollis eget mauris.',
            'fecha'=>'2020-07-06'
        ]);
        DB::table('blogs')->insert([
            'titulo'=>'Suspendisse potenti',
            'imagen'=>'banner_blogs.jpg',
            'contenido'=>'Suspendisse potenti. Vivamus gravida ante at metus posuere vestibulum. Integer tortor velit, posuere eu augue nec, 
                        volutpat porttitor turpis. Aenean pulvinar laoreet erat volutpat hendrerit. Cras molestie varius feugiat. Praesent 
                        dictum vehicula purus, semper imperdiet arcu ultricies eget. Phasellus et arcu nisi. In hac habitasse platea dictumst. 
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'fecha'=>'2020-07-05'
        ]);
    }
}
