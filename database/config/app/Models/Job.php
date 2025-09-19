<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

class Job
{
    //
    public static function all(){
        return [
            ['title' => 'softwareEngineer', 'salary' => '4000$'],
            ['title' => 'software Architect', 'salary' => '5000$']
        ];
     }
}
