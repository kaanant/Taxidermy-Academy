<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'price' => $faker->numberBetween(50,200),
        'stock'=>$faker->numberBetween(0,5),
        'discount' =>$faker->numberBetween(0,100),
        'product_quality' => $faker->numberBetween(1,3),
        'product_key' =>$faker->unique()->jobTitle(),
        'brand' =>$faker->company,
        'category_id'=>$faker->numberBetween(1,5)
    ];
});