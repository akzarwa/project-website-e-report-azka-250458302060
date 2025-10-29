<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin Zero',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'nik' => '1234567890123456',
                'gender' => 'female',
                'role' => 'admin',
                'password' => bcrypt('7777777')
            ),
            array(
                'name' => 'User uno',
                'email' => 'user@gmail.com',
                'phone' => '081254378090',
                'nik' => '09876543210123456',
                'gender' => 'male',
                'role' => 'user',
                'password' => bcrypt('1234567')
            ),
        ));
    }
}
