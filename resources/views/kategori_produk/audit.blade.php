<br>
<h6 class="m-0 font-weight-bold text-primary">History & Data</h6>

<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tr>
            <th>{{ ucfirst("timestamp") }}</th>
            <th>{{ ucfirst("event") }}</th>
            <th>{{ ucfirst("before") }}</th>
            <th>{{ ucfirst("after") }}</th>
            <th>{{ ucfirst("user") }}</th>
            <th>{{ ucfirst("restore") }}</th>
        </tr>
        @foreach ($audits as $audit)
        <tr>
            <td>{{ $audit->created_at }}</td>
            <td>{{ $audit->event }}</td>
            <td>
                <li>name : {{ $audit->old_values["name"] ?? "-" }}</li>
            </td>
            <td>
                <li>name : {{ $audit->new_values["name"] ?? "-" }}</li>
            </td>
            <td>{{ $audit->user->name }}</td>
            <td>@if($audit->event == "deleted")<a href="{{ route("restore", [
                "model" => "kategori_produk",
                "id"    => $audit->auditable_id,
            ]) }}" class="btn btn-sm btn-info">{{ ucfirst("restore") }}</a>@endif</td>
        </tr>
        @endforeach
    </table>
</div>
