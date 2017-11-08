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
            'name'        => 'required',
            'points_from' => 'required|numeric',
            'points_to'   => 'required|numeric',
        ]);

		return parent::storeCrud();
	}

    public function update(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'points_from' => 'required|numeric',
            'points_to'   => 'required|numeric',
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
        	'name'  => 'points_from',
            'type'  => 'number',
        	'label' => "Points From",
    	]);
        $this->crud->addField([
        	'name'  => 'points_to',
            'type'  => 'number',
        	'label' => "Points To",
    	]);
    }

    private function declareTableColumn()
    {
        $this->crud->addColumn([
            'name'  => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addColumn([
            'name'  => 'points_from',
            'label' => 'Points From',
        ]);
        $this->crud->addColumn([
            'name'  => 'points_to',
            'label' => 'Points To',
        ]);
    }

}
