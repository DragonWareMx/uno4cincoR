<?php

use Illuminate\Database\Seeder;

class blog_tagTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_tag')->insert([
            'blog_id'=>'1',
            'tag_id'=>'1'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'1',
            'tag_id'=>'2'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'1',
            'tag_id'=>'3'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'2',
            'tag_id'=>'4'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'2',
            'tag_id'=>'5'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'2',
            'tag_id'=>'6'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'2',
            'tag_id'=>'7'
        ]);
        DB::table('blog_tag')->insert([
            'blog_id'=>'2',
            'tag_id'=>'3'
        ]);
    }
}
