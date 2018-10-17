<?php

use Illuminate\Database\Seeder;
use Dirape\Token\Token;
use App\User;
use App\Alumno;
use App\Profesor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        // $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $alumnos = Alumno::all();
        $profesores = Profesor::all();

        foreach ($alumnos as $alumno) 
        {
            $matricula = $alumno->matricula;
            $password = Hash::make($matricula);
            User::create([
                'name'              => $matricula,
                'email'             => $matricula.'@test.com',
                'password'          => $password,
                'remember_token'    => (new Token())->Unique('users', 'remember_token', 60)
            ]);
            
        }

        foreach ($profesores as $profesor) 
        {
            $dni = $profesor->DNI;
            $password = Hash::make($dni);
            User::create([
                'name'              => $dni,
                'email'             => $dni.'@test.com',
                'password'          => $password,
                'remember_token'    => (new Token())->Unique('users', 'remember_token', 60)
            ]);
            
        }
    }
}
