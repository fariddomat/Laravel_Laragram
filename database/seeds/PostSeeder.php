<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Post', 80)->create();
        factory('App\Post', 20)->states('news')->create();
        factory('App\Post', 20)->states('project')->create();

    }
}
