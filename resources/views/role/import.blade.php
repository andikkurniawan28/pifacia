@extends("admin.index")

@section("title")
    Impor {{ ucfirst("role") }}
@endsection

@section("main")
    <form action="{{ route("role-process") }}" method="POST" enctype="multipart/form-data">
        @csrf @method("POST")
        <div class="form-group">
            <label for="file">{{ ucfirst("file") }}</label>
            <input type="file" class="form-control-file" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
