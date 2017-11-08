<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PlayerCrudController extends CrudController
{
    public function setUp()
    {
        $this->crud->setModel(Player::class);
        $this->crud->setRoute('admin/players');
        $this->crud->setEntityNameStrings('player', 'players');
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
            'name'     => 'required',
            'email'    => 'required|unique:players|email',
        ]);

		return parent::storeCrud();
	}

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('players')->ignore($request->id)
            ],
        ]);

        return parent::updateCrud();
    }

    private function declareFromField()
    {
        $this->crud->addField([
        	'name'  => 'name',
        	'label' => "Name"
    	]);
        $this->crud->addField([
        	'name'  => 'email',
        	'label' => "Email Address",
    	]);
    }

    private function declareTableColumn()
    {
        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addColumn([
            'name'  => 'email',
            'label' => 'Email Address',
        ]);
        $this->crud->addColumn([
            'name'  => 'points',
            'label' => 'Points',
        ]);
    }

}
