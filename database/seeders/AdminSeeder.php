<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'municipality'=> 'Abuyog',
            'phone'=> '09123451231',
            'email' => 'admin@gmail.com',
            'type' => 1,
            'password' => bcrypt('password')
        ]);
    }
}
