<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'Admin';
        $user->email = 'admin@test.com';
        $user->password = Hash::make('admin123');
        $user->role_id = Role::where('name', 'Admin')->first()->id;
        $user->save();
    }
}