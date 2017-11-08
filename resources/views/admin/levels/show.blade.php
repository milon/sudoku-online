@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Level Details</span>
	    <small>Details of a specific level</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url('/admin/levels') }}" class="text-capitalize">Levels</a></li>
	    <li class="active">Level Details</li>
	  </ol>
	</section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <a href="{{ url('/admin/levels') }}">
                <i class="fa fa-angle-double-left"></i>
                Back to all level
            </a>
            <br><br>

            <div class="box">

                <div class="box-header with-border">
                    <h4>
						Level name: {{ $level->name }}

						<a href="{{ url("/admin/levels/{$level->id}/edit") }}" class="btn btn-default btn-sm pull-right">
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
                                <td>{{ $level->name }}</td>
                            </tr>

                            <tr>
                                <td>Rank</td>
                                <td>{{ $level->rank }}</td>
                            </tr>
                        </tbody>
                    </table>

                    @include('admin.levels._games')
                </div>

            </div>

        </div>
    </div>
@endsection
