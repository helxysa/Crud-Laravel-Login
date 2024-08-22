<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if(!User::where('email', 'joao@user.com.br')->first()){
            User::create([
                'name' => 'Joao',
                'email' => 'joao@user.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'gustavo@user.com.br')->first()){
            User::create([
                'name' => 'Gustavo',
                'email' => 'gustavo@user.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'marcos@user.com.br')->first()){
            User::create([
                'name' => 'Marcos',
                'email' => 'marcos@user.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }

    }
};




