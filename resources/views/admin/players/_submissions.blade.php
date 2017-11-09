<h4>Submissions</h4>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
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
