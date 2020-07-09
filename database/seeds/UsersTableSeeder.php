<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creo un usuario admin por defecto
        User::create([
        'name' => 'Maxi Avendaño',
        'email' => 'maxi@gmail.com',
        'password' => bcrypt('123456'), 
        'dni' => '3389567',
        'address' => '',
        'phone' => '',
        'role' => 'admin'
        ]);
        //se crean 50 usuario con lo cargado en UserFactory que es un modelfactory
        factory(User::class, 50)->create();
    }
}
