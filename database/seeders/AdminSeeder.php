<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => bcrypt('123456'),
            'is_admin' =>'1',
        ]);
        User::create([
            
            'name' => 'User',
            'email' => 'user@domain.com',
            'password' => bcrypt('123456'),
            'is_admin' =>'0',
        ]);
    }
}
