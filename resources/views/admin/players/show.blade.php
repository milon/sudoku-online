@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Player Details</span>
	    <small>Details of a specific player</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url('/admin/players') }}" class="text-capitalize">Player</a></li>
	    <li class="active">Player Details</li>
	  </ol>
	</section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <a href="{{ url('/admin/players') }}">
                <i class="fa fa-angle-double-left"></i>
                Back to all player
            </a>
            <br><br>

            <div class="box">

                <div class="box-header with-border">
                    <h4>
						Player name: {{ $player->name }}

						<a href="{{ url("/admin/players/{$player->id}/edit") }}" class="btn btn-default btn-sm pull-right">
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
                                <td>{{ $player->name }}</td>
                            </tr>

                            <tr>
                                <td>Email Address</td>
                                <td>{{ $player->email }}</td>
                            </tr>

                            <tr>
                                <td>Points</td>
                                <td>{{ $player->points }}</td>
                            </tr>

                            <tr>
                                <td>Api Token</td>
                                <td>{{ $player->api_token }}</td>
                            </tr>

                            <tr>
                                <td>Level</td>
                                <td>{{ $player->level }}</td>
                            </tr>

                            <tr>
                                <td>Episode</td>
                                <td>{{ $player->episode }}</td>
                            </tr>
                        </tbody>
                    </table>

					@include('admin.players._submissions')

                </div>

            </div>

        </div>
    </div>
@endsection
