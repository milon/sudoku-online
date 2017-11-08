@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Sudoku Details</span>
	    <small>Details of a specific sudoku</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url('/admin/games') }}" class="text-capitalize">Sudoku</a></li>
	    <li class="active">Sudoku Details</li>
	  </ol>
	</section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <a href="{{ url('/admin/games') }}">
                <i class="fa fa-angle-double-left"></i>
                Back to all sudoku
            </a>
            <br><br>

            <div class="box">

                <div class="box-header with-border">
                    <h4>
						Sudoku name: {{ $game->name }}

						<a href="{{ url("/admin/games/{$game->id}/edit") }}" class="btn btn-default btn-sm pull-right">
							<i class="fa fa-edit"></i>
							Edit
						</a>
					</h4>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $game->name }}</td>
                            </tr>

                            <tr>
                                <td>Grid Size</td>
                                <td>{{ $game->grid_size }}</td>
                            </tr>

                            <tr>
                                <td>Difficulty</td>
                                <td>{{ $game->difficulty }}</td>
                            </tr>

                            <tr>
                                <td>Scope</td>
                                <td>{{ $game->score }}</td>
                            </tr>

                            <tr>
                                <td>Penalty</td>
                                <td>{{ $game->penalty }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
@endsection
