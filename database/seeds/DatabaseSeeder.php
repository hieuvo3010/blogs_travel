<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('category')->insert([
            ['title' => 'Tour 1', 'status' => '1'],
            ['title' => 'Tour 2', 'status' => '1'],
            ['title' => 'Tour 3', 'status' => '1'],
            ['title' => 'Tour 4', 'status' => '1'],
        ]);

        DB::table('post')->insert([
            ['title' => 'post 1', 'image' => '1hinh1.png','content' => 'content 1','summary' => 'summary 1','status' => '1'],
            ['title' => 'post 1', 'image' => '1hinh1.png','content' => 'content 21','summary' => 'summary2','status' => '1'],
            ['title' => 'post 1', 'image' => '1hinh1.png','content' => 'content 3','summary' => 'summary 31','status' => '1'],
            ['title' => 'post 1', 'image' => '1hinh1.png','content' => 'content 4','summary' => 'summary 4','status' => '1'],
        ]);

        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

    }
}
