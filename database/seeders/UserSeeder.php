<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Muh Sajid Abdillah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
