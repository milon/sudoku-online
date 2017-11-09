<div class="row">
    {{-- Players --}}
    <div class="col-md-3">
        @include('admin.dashboard._box', [
            'title' => 'Players',
            'color' => 'red',
            'count' => $players_count,
            'icon'  => 'fa fa-gamepad',
            'url'   => url('/admin/players')
        ])
    </div>

    {{-- Levels --}}
    <div class="col-md-3">
        @include('admin.dashboard._box', [
            'title' => 'Levels',
            'count' => $levels_count,
            'icon'  => 'fa fa-th-list',
            'url'   => url('/admin/levels')
        ])
    </div>

    {{-- Games --}}
    <div class="col-md-3">
        @include('admin.dashboard._box', [
            'title' => 'Sudoku',
            'color' => 'purple',
            'count' => $games_count,
            'icon'  => 'fa fa-table',
            'url'   => url('/admin/games')
        ])
    </div>

    {{-- Players --}}
    <div class="col-md-3">
        @include('admin.dashboard._box', [
            'title' => 'Submissions',
            'color' => 'red',
            'count' => $submission_count,
            'icon'  => 'fa fa-object-group',
            'url'   => url('/admin/players')
        ])
    </div>
</div>
