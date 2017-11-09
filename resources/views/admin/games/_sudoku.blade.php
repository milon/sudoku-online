<table class="table table-bordered table-striped">
    <tbody>
        @foreach ($table as $row)
            <tr>
                @foreach ($row as $column)
                    <td>{{ $column or '?' }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
