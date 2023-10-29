@extends("admin.index")

@section("title")
    Tambah {{ ucfirst("produk") }}
@endsection

@section("main")
    <form action="{{ route("produk.store") }}" method="POST">
        @csrf @method("POST")
        <div class="form-group">
            <label for="kategori_produk_id">{{ ucfirst("kategori_produk") }}</label>
            <select class="form-control" name="kategori_produk_id">
                @foreach ($kategori_produks as $kategori_produk)
                    <option value="{{ $kategori_produk->id }}">{{ $kategori_produk->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="supplier_id">{{ ucfirst("supplier") }}</label>
            <select class="form-control" name="supplier_id">
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">{{ ucfirst("name") }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">{{ ucfirst("price") }}</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="barcode_asli">{{ ucfirst("barcode_asli") }}</label>
            <input type="text" class="form-control" id="barcode_asli" name="barcode_asli" required>
        </div>
        <div class="form-group">
            <label for="barcode_internal">{{ ucfirst("barcode_internal") }}</label>
            <input type="text" class="form-control" id="barcode_internal" name="barcode_internal" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include("produk.audit")
@endsection
