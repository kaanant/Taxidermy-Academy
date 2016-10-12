<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('products')->truncate();

        factory(App\Category::class, 5)->create();
        factory(App\Product::class,100)->create();
    }
}
