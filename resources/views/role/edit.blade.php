@extends("admin.index")

@section("title")
    Edit {{ ucfirst("role") }}
@endsection

@section("main")
    <form action="{{ route("role.update", $role->id) }}" method="POST">
        @csrf @method("PUT")
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("role.audit")
@endsection
