<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{   
   
    public function run(): void
    {
       
       // Ensure UsersSeeder exists before calling it
       $this->call(UserSeeder::class);
    }
}
