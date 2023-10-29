@extends("admin.index")

@section("title")
    Tambah {{ ucfirst("supplier") }}
@endsection

@section("main")
    <form action="{{ route("supplier.store") }}" method="POST" enctype="multipart/form-data">
        @csrf @method("POST")
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">{{ ucfirst("phone") }}</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">{{ ucfirst("address") }}</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
            <label for="contract">{{ ucfirst("contract") }}</label>
            <input type="file" class="form-control-file" id="contract" name="contract" accept="application/pdf">
        </div>
        <div class="form-group">
            <label for="is_active">{{ ucfirst("is_active") }}</label>
            <input type="number" class="form-control" id="is_active" name="is_active" min="0" max="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("supplier.audit")
@endsection
