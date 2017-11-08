<?php

use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'id' => 1,
            'name' => 'Easy 1',
            'grid_size' => 4,
            'difficulty' => 'Sudoku::EASY',
            'score' => 5,
            'penalty' => 1,
        ]);

        Game::create([
            'id' => 2,
            'name' => 'Easy 2',
            'grid_size' => 4,
            'difficulty' => 'Sudoku::EASY',
            'score' => 5,
            'penalty' => 1,
        ]);

        Game::create([
            'id' => 3,
            'name' => 'Easy 3',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::EASY',
            'score' => 10,
            'penalty' => 2,
        ]);

        Game::create([
            'id' => 4,
            'name' => 'Easy 4',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::EASY',
            'score' => 10,
            'penalty' => 2,
        ]);

        Game::create([
            'id' => 5,
            'name' => 'Easy 5',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::NORMAL',
            'score' => 10,
            'penalty' => 2,
        ]);

        Game::create([
            'id' => 6,
            'name' => 'Normal 1',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::EASY',
            'score' => 10,
            'penalty' => 2,
        ]);

        Game::create([
            'id' => 7,
            'name' => 'Normal 2',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::EASY',
            'score' => 10,
            'penalty' => 2,
        ]);

        Game::create([
            'id' => 8,
            'name' => 'Normal 3',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::Normal',
            'score' => 15,
            'penalty' => 3,
        ]);

        Game::create([
            'id' => 9,
            'name' => 'Normal 4',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::EASY',
            'score' => 15,
            'penalty' => 3,
        ]);

        Game::create([
            'id' => 10,
            'name' => 'Normal 5',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::EASY',
            'score' => 15,
            'penalty' => 3,
        ]);

        Game::create([
            'id' => 11,
            'name' => 'Hard 1',
            'grid_size' => 9,
            'difficulty' => 'Sudoku::HARD',
            'score' => 15,
            'penalty' => 3,
        ]);

        Game::create([
            'id' => 12,
            'name' => 'Hard 2',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::EASY',
            'score' => 15,
            'penalty' => 4,
        ]);

        Game::create([
            'id' => 13,
            'name' => 'Hard 3',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::NORMAL',
            'score' => 15,
            'penalty' => 4,
        ]);

        Game::create([
            'id' => 14,
            'name' => 'Hard 4',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::NORMAL',
            'score' => 15,
            'penalty' => 4,
        ]);

        Game::create([
            'id' => 15,
            'name' => 'Hard 5',
            'grid_size' => 16,
            'difficulty' => 'Sudoku::HARD',
            'score' => 15,
            'penalty' => 5,
        ]);
    }
}
