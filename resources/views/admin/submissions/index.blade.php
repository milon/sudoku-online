@extends('backpack::layout')

@section('header')
	<section class="content-header">
	  <h1>
	    <span class="text-capitalize">Submissions</span>
	    <small>{{ trans('backpack::crud.all') }} <span class="text-lowercase">Submissions</span> {{ trans('backpack::crud.in_the_database') }}.</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="{{ url(config('backpack.base.route_prefix'), 'dashboard') }}">{{ trans('backpack::crud.admin') }}</a></li>
	    <li><a href="{{ url('/admin/submissions') }}" class="text-capitalize">Submissions</a></li>
	    <li class="active">{{ trans('backpack::crud.list') }}</li>
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
                                <th>Player</th>
                                <th>Game Name</th>
                                <th>Score</th>
                                <th>Penalty</th>
                                <th>Status</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->player->name }}</td>
                                    <td>{{ $submission->game->name }}</td>
                                    <td>{{ $submission->game->score }}</td>
                                    <td>{{ $submission->game->penalty }}</td>
                                    <td>{{ $submission->status_name }}</td>
                                    <td>{{ $submission->created_at->toDateTimeString() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No problem submitted yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $submissions->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
