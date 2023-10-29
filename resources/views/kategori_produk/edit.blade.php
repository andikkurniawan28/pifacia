@extends("admin.index")

@section("title")
    Edit {{ ucfirst("kategori_produk") }}
@endsection

@section("main")
    <form action="{{ route("kategori_produk.update", $kategori_produk->id) }}" method="POST">
        @csrf @method("PUT")
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $kategori_produk->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("kategori_produk.audit")
@endsection
