<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    if (User::count()===0) {
        # code...
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '123',
        ]);
    }
}
}
