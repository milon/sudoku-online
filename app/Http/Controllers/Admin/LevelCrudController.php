<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class LevelCrudController extends CrudController
{
    public function setUp()
    {
        $this->crud->setModel(Level::class);
        $this->crud->setRoute('admin/levels');
        $this->crud->setEntityNameStrings('level', 'levels');
        $this->crud->setDefaultPageLength(10);
        $this->crud->enableExportButtons();

        // Declare form field
        $this->declareFromField();

        // Column shows in table
        $this->declareTableColumn();
    }

    public function store(Request $request)
	{
        $request->validate([
            'name' => 'required',
            'rank' => 'required|numeric',
        ]);

        $level = Level::create([
            'name'       => $request->name,
            'rank'       => $request->rank,
            'game_level' => $request->game_level,
        ]);

        $level->games()->detach();
        foreach (json_decode($request->game_level) as $game) {
            $level->games()->attach($game->game, ['position' => $game->position]);
        }

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($level->getKey());
	}

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rank' => 'required|numeric',
        ]);

        $level = Level::find($request->id);
        $level->update([
            'name'       => $request->name,
            'rank'       => $request->rank,
            'game_level' => $request->game_level,
        ]);

        $level->games()->detach();
        foreach (json_decode($request->game_level) as $game) {
            $level->games()->attach($game->game, ['position' => $game->position]);
        }

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($level->getKey());
    }

    private function declareFromField()
    {
        $this->crud->addField([
        	'name'  => 'name',
        	'label' => "Name"
    	]);
        $this->crud->addField([
        	'name'  => 'rank',
            'type'  => 'number',
        	'label' => "Rank",
    	]);
        $this->crud->addField([
            'name'            => 'game_level',
            'label'           => 'Games',
            'type'            => 'game_table',
            'entity_singular' => 'game',    // used on the "Add X" button
            'columns'         => [
                'game'     => 'Game',
                'position' => 'Position',
            ],
            'max' => 35,
            'min' => 0,
        ]);
    }

    private function declareTableColumn()
    {
        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addColumn([
            'name'  => 'rank',
            'label' => 'Rank',
        ]);
    }

}
