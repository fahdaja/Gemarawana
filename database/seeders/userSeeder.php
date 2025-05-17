<?php

namespace Database\Seeders;

use App\Models\userAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        userAdmin::create([
            'username' => 'fahdganteng',
            'password' => '27November2008',
        ]);
    }
}
