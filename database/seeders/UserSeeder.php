<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //
         User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
             'role' => 'admin',
            'password'=> Hash::make('12345678'),
        ]);
        User::factory()->create([
            'name' => 'editor1',
            'email' => 'man@gmail.com',
            'role'  => 'editor',
            'password'=> Hash::make('12345678'),
        ]);
         User::factory()->create([
            'name' => 'editor2',
            'email' => 'woman@gmail.com',
            'role'  => 'editor',
            'password'=> Hash::make('12345678'),
        ]);
    }
}
