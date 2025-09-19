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
            'name' => 'root',
            'email' => 'root@root.com',
            'password'=> Hash::make('12345'),
        ]);
    }
}
