<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class UserCrudController extends CrudController
{
    public function setUp()
    {
        $this->crud->setModel(User::class);
        $this->crud->setRoute('admin/users');
        $this->crud->setEntityNameStrings('user', 'users');
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
            'email'    => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($user->getKey());
	}

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($request->id)
            ],
            'password' => 'required|confirmed',
        ]);

        $user = User::find($request->id);
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->setSaveAction();

        return $this->performSaveAction($user->getKey());
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
    }

}
