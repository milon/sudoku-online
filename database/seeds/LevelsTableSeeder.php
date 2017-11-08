<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level1 = Level::create([
            'name' => 'Easy',
            'rank' => 1,
            'game_level' => "[{\"game\":\"1\",\"position\":1},{\"game\":\"2\",\"position\":2},{\"game\":\"3\",\"position\":3},{\"game\":\"4\",\"position\":4},{\"game\":\"5\",\"position\":5}]",
        ]);
        $level1->games()->attach(1, ['position' => 1]);
        $level1->games()->attach(2, ['position' => 2]);
        $level1->games()->attach(3, ['position' => 3]);
        $level1->games()->attach(4, ['position' => 4]);
        $level1->games()->attach(5, ['position' => 5]);

        $level2 = Level::create([
            'name' => 'Normal',
            'rank' => 2,
            'game_level' => "[{\"game\":\"6\",\"position\":1},{\"game\":\"7\",\"position\":2},{\"game\":\"8\",\"position\":3},{\"game\":\"9\",\"position\":4},{\"game\":\"10\",\"position\":5}]",
        ]);
        $level2->games()->attach(6, ['position' => 1]);
        $level2->games()->attach(7, ['position' => 2]);
        $level2->games()->attach(8, ['position' => 3]);
        $level2->games()->attach(9, ['position' => 4]);
        $level2->games()->attach(10, ['position' => 5]);

        $level3 = Level::create([
            'name' => 'Hard',
            'rank' => 3,
            'game_level' => "[{\"game\":\"11\",\"position\":1},{\"game\":\"12\",\"position\":2},{\"game\":\"13\",\"position\":3},{\"game\":\"14\",\"position\":4},{\"game\":\"15\",\"position\":5}]",
        ]);
        $level3->games()->attach(11, ['position' => 1]);
        $level3->games()->attach(12, ['position' => 2]);
        $level3->games()->attach(13, ['position' => 3]);
        $level3->games()->attach(14, ['position' => 4]);
        $level3->games()->attach(15, ['position' => 5]);
    }
}
