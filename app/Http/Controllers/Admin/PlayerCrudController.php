<?php

namespace App\Http\Controllers\Admin;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class PlayerCrudController extends CrudController
{
    /**
     * Setup of the controller
     */
    public function setUp()
    {
        $this->crud->setModel(Player::class);
        $this->crud->setRoute('admin/players');
        $this->crud->setEntityNameStrings('player', 'players');
        $this->crud->setDefaultPageLength(10);
        $this->crud->enableExportButtons();
        $this->crud->allowAccess(['list', 'create', 'delete', 'show']);

        // Declare form field
        $this->declareFromField();

        // Column shows in table
        $this->declareTableColumn();
    }

    /**
     * Create a new player
     *
     * @param  Request $request
     * @return mixed
     */
    public function store(Request $request)
	{
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:players|email',
            'password' => 'required|confirmed',
        ]);

		$player = Player::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($player->getKey());
	}

    /**
     * Update a new player
     *
     * @param  Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('players')->ignore($request->id)
            ],
            'password' => 'required|confirmed',
        ]);

        $player = Player::find($request->id);
        $player = $player->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($player->getKey());
    }

    /**
     * Declare form fields
     *
     * @return null
     */
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
        $this->crud->addField([
        	'name'  => 'password',
        	'label' => 'Password',
            'type'  => 'password',
    	]);
        $this->crud->addField([
        	'name'  => 'password_confirmation',
        	'label' => 'Confirm Password',
            'type'  => 'password',
    	]);
    }

    /**
     * Declare colums for table
     *
     * @return null
     */
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
        $this->crud->addColumn([
            'name'  => 'level',
            'label' => 'Level',
        ]);
        $this->crud->addColumn([
            'name'  => 'episode',
            'label' => 'Episode',
        ]);
    }

    /**
     * Show details of a player
     *
     * @param  int $id
     * @return View $view
     */
    public function show($id)
    {
        $player = Player::find($id);
        $submissions = $player->submissions()->with('game')->latest()->paginate(10);

        return view('admin.players.show', compact('player', 'submissions'));
    }

}
