<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();

        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@sudoku.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
