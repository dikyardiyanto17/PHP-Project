<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostAndComment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'content' => 'Hello World',
            'customer_id' => '1',
        ]);
        DB::table('comments')->insert([
            'comment' => 'Hello Human',
            'customer_id' => '1',
            'post_id' => '1',
        ]);
    }
}
