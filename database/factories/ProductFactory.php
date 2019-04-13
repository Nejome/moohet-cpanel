<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'sub_category_id' => 1,
        'primary_code' => $faker->unique()->randomNumber(6),
        'secondary_code' => $faker->unique()->randomNumber(3),
        'tariff_code' => $faker->bothify('**********'),
        'name' => $faker->name(),
        'description' => $faker->realText(),
        'less_amount_text' => 'حبة',
        'less_amount_value' => 50,
        'waiting_period' => 5,
        'price' => $faker->randomFloat(2, 10.00, 1500.00),
        'discount' => 5,
        'company' => $faker->name(),
        'company_website' => $faker->url(),
        'size_text' => 'جرام',
        'size_value' => $faker->randomNumber(2),
        'color' => $faker->colorName,
        'active' => intval($faker->boolean),
    ];
});
