@extends("admin.index")

@section("title")
    {{ ucfirst("role") }}
@endsection

@section("main")
<a href="{{ route("role.create") }}" class="btn btn-primary btn-sm">Tambah</a>
<a href="{{ route("role-import") }}" class="btn btn-success btn-sm">Impor</a>
<div class="table-responsive">
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("user") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @foreach ($role->user as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Action">
                        <form action="{{ route("role.destroy", $role->id) }}" method="POST">
                            @csrf @method("DELETE")
                            <a href="{{ route("role.edit", $role->id) }}" type="button" class="btn btn-secondary btn-sm">Edit</a>
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
