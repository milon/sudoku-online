<h4>Sudoku</h4>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Grid Size</th>
            <th>Difficulty</th>
            <th>score</th>
            <th>Penalty</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($level->games as $game)
            <tr>
                <td>{{ $game->name }}</td>
                <td>{{ $game->grid_size }}</td>
                <td>{{ $game->difficulty }}</td>
                <td>{{ $game->score }}</td>
                <td>{{ $game->penalty }}</td>
                <td>
                    <a href="{{ url("/admin/games/{$game->id}") }}" class="btn btn-xs btn-default">
                        <i class="fa fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No sudoku associated yet.</td>
            </tr>
        @endforelse
    </tbody>
</table>
