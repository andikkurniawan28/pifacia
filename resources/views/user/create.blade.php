@extends("admin.index")

@section("title")
    Tambah {{ ucfirst("user") }}
@endsection

@section("main")
    <form action="{{ route("user.store") }}" method="POST">
        @csrf @method("POST")
        <div class="form-group">
            <label for="role">{{ ucfirst("role") }}</label>
            <select class="form-control" name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">{{ ucfirst("email") }}</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">{{ ucfirst("password") }}</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("user.audit")
@endsection
