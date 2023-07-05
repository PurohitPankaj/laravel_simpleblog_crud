<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Admin',
            'last_name' => 'User',
            'mobile' => '9999999999',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('99999999'),
            'role_as' => 1,
            'remember_token' => Str::random(10),
        ]);

        $user->save();
    }
}
