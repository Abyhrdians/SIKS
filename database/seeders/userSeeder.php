<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         User::factory()->create([
            'name' => 'Aby',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => '1', // admin
            'foto' => 'ini foto'
        ]);
        User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'ks@gmail.com',
            'password' => Hash::make('ks123'),
            'role' => '2', // Kepala Sekolah
            'foto' => 'ini foto'

         ]);
          User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'Super@gmail.com',
            'password' => Hash::make('super123'),
            'role' => '0', // Super Admin
            'foto' => 'ini foto'

         ]);
    }
}
