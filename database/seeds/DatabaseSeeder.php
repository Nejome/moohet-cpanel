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
        DB::table('users')->insert([
            'name' => 'النجومي مبارك',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'role' => 1,
        ]);

       /* $this->call([
            ProductsTableSeeder::class,
        ]);

        for($i = 1; $i <= 30; $i ++) {

            DB::table('images')->insert([
                'product_id' => $i,
                'name' => 'default_products_image.jpg',
                'url' => asset('images/default_products_image.jpg')
            ]);

        }*/
    }
}
