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

        DB::table('settings')->insert([
           'name' => 'محيط',
            'revoke_duration' => 30,
            'revoke_amount' => 3000
        ]);
    }
}
