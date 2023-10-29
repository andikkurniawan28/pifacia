@extends("admin.index")

@section("title")
    {{ ucfirst("supplier") }}
@endsection

@section("main")
<a href="{{ route("supplier.create") }}" class="btn btn-primary btn-sm">Tambah</a>
<div class="table-responsive">
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("uuid") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("phone") }}</th>
                <th>{{ ucfirst("address") }}</th>
                <th>{{ ucfirst("contract") }}</th>
                <th>{{ ucfirst("is_active") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->uuid }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->address }}</td>
                <td>
                    @if($supplier->contract != NULL)
                    <a href="{{ url("/storage{$supplier->contract}") }}" target="_blank">View</a></td>
                    @endif
                <td>{{ $supplier->is_active }}</td>
                <td>
                    <div class="btn-group" supplier="group" aria-label="Action">
                        <form action="{{ route("supplier.destroy", $supplier->uuid) }}" method="POST">
                            @csrf @method("DELETE")
                            <a href="{{ route("supplier.edit", $supplier->uuid) }}" type="button" class="btn btn-secondary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
