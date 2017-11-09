@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Leadboard</span>
	    <small>Top 10 leadboarders of Sudoku Ninja.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li class="active">Leadboard</li>
	  </ol>
	</section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-body table-responsive">
                    <table id="crudTable" class="table table-bordered table-striped display">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Player</th>
                                <th>Points</th>
                                <th>Level</th>
                                <th>Episode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($players as $key => $player)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->points }}</td>
                                    <td>{{ $player->level }}</td>
                                    <td>{{ $player->episode }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No player registered yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
