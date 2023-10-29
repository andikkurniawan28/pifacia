@extends("admin.index")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("main")
<a href="{{ route("user.create") }}" class="btn btn-primary btn-sm">Tambah</a>
<a href="{{ route("user-import") }}" class="btn btn-success btn-sm">Impor</a>
<div class="table-responsive">
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("role") }}</th>
                <th>{{ ucfirst("email") }}</th>
                {{-- <th>{{ ucfirst("password") }}</th> --}}
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->email }}</td>
                {{-- <td>********</td> --}}
                <td>
                    <div class="btn-group" user="group" aria-label="Action">
                        <form action="{{ route("user.destroy", $user->id) }}" method="POST">
                            @csrf @method("DELETE")
                            <a href="{{ route("user.edit", $user->id) }}" type="button" class="btn btn-secondary btn-sm">Edit</a>
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
