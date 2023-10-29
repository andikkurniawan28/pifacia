@extends("admin.index")

@section("title")
    Tambah {{ ucfirst("kategori_produk") }}
@endsection

@section("main")
    <form action="{{ route("kategori_produk.store") }}" method="POST">
        @csrf @method("POST")
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("kategori_produk.audit")
@endsection
