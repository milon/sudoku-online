<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use AbcAeffchen\sudoku\Sudoku;
use App\Http\Requests\GameRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class GameCrudController extends CrudController
{
    /**
     * Setup of the controller
     */
    public function setUp()
    {
        $this->crud->setModel(Game::class);
        $this->crud->setRoute('admin/games');
        $this->crud->setEntityNameStrings('sudoku', 'sudoku');
        $this->crud->setDefaultPageLength(10);
        $this->crud->enableExportButtons();
        $this->crud->allowAccess(['list', 'create', 'delete', 'show']);

        // Declare form field
        $this->declareFromField();

        // Column shows in table
        $this->declareTableColumn();
    }

    /**
     * Create a new game
     *
     * @param  GameRequest $request
     * @return mixed
     */
    public function store(GameRequest $request)
	{
        return parent::storeCrud();
	}

    /**
     * Update a new game
     *
     * @param  GameRequest $request
     * @return mixed
     */
    public function update(GameRequest $request)
    {
        return parent::updateCrud();
    }

    /**
     * Declare form fields
     *
     * @return null
     */
    public function declareFromField()
    {
        $this->crud->addField([
        	'name'  => 'name',
        	'label' => "Name"
    	]);
        $this->crud->addField([
        	'name'  => 'grid_size',
        	'label' => "Grid Size",
            'allows_null' => false,
            'type' => 'select2_from_array',
            'options' => [
                ''   => 'Select Grid Size',
                '4'  => '4',
                '9'  => '9',
                '14' => '16',
            ],
    	]);
        $this->crud->addField([
        	'name'  => 'difficulty',
        	'label' => "Difficulty",
            'allows_null' => false,
            'type' => 'select2_from_array',
            'options' => [
                ''   => 'Select Difficulty',
                'Sudoku::EASY'  => 'Easy',
                'Sudoku::NORMAL' => 'Normal',
                'Sudoku::MEDIUM' => 'Medium',
                'Sudoku::HARD' => 'Hard',
            ],
    	]);
        $this->crud->addField([
        	'name'  => 'score',
        	'label' => "Score",
            'type'  => 'number',
    	]);
        $this->crud->addField([
        	'name'  => 'penalty',
        	'label' => "Penalty",
            'type'  => 'number',
    	]);
    }

    /**
     * Declare colums for table
     *
     * @return null
     */
    public function declareTableColumn()
    {
        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addColumn([
            'name'  => 'grid_size',
            'label' => 'Grid Size',
        ]);
        $this->crud->addColumn([
            'name'  => 'difficulty',
            'label' => 'Difficulty',
        ]);
        $this->crud->addColumn([
            'name'  => 'score',
            'label' => 'Score',
        ]);
        $this->crud->addColumn([
            'name'  => 'penalty',
            'label' => 'Penalty',
        ]);
    }

    /**
     * Show details of a game
     *
     * @param  int $id
     * @return View $view
     */
    public function show($id)
    {
        $game = Game::find($id);

        return view('admin.games.show', compact('game'));
    }

}
