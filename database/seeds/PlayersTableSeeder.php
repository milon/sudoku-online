<?php

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::create([
            'name'      => 'Nuruzzaman Milon',
            'email'     => 'contact@milon.im',
            'api_token' => 'pmhhNtUjSXzLsD99NAhOUKxAzAYg8TZzo23TAUDiDHo8pCFh17RF5FbdIVc3',
        ]);

        Player::create([
            'name'      => 'Surayea Rashid Shanti',
            'email'     => 'surayea.rashid@gmail.com',
            'api_token' => 'TtzWGDsiFBWNLYNNIhVQacVf4VYmcCcVERERav9PVUMk8RHwVF6pF369XFsj',
        ]);
    }
}
