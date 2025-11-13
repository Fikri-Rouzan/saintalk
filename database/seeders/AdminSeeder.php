<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = env('ADMIN_NAME');
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$name || !$email || !$password) {
            $this->command->error('The ADMIN_NAME, ADMIN_EMAIL, or ADMIN_PASSWORD variables are not set in the .env file.');

            return;
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ])->assignRole('admin');
    }
}
