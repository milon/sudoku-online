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
            'api_token' => 'V6cnSbsBVuBRKMSYqr9eesqeuUxbWhiksREA3EbQ8A6gykVLETsBVuBRKMSY',
            'is_admin'  => true,
        ]);
    }
}
