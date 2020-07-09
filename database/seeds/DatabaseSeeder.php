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
        //llamo UsersTableSeeder
        $this->call(UsersTableSeeder::class);
    }
}
