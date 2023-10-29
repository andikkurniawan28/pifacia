@extends("admin.index")

@section("title")
    Edit {{ ucfirst("supplier") }}
@endsection

@section("main")
    <form action="{{ route("supplier.update", $supplier->uuid) }}" method="POST">
        @csrf @method("PUT")
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="phone">{{ ucfirst("phone") }}</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $supplier->phone }}" required>
        </div>
        <div class="form-group">
            <label for="address">{{ ucfirst("address") }}</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $supplier->address }}" >
        </div>
        <div class="form-group">
            <label for="is_active">{{ ucfirst("is_active") }}</label>
            <input type="number" class="form-control" id="is_active" name="is_active" min="0" max="1" value="{{ $supplier->is_active }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("supplier.audit")
@endsection
