<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use AbcAeffchen\sudoku\Sudoku;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test()
    {
        //$task = Sudoku::generate(9, Sudoku::NORMAL);

        list($task,$solution) = Sudoku::generateWithSolution(9, Sudoku::NORMAL);

        return [$task, $solution];
    }
}
