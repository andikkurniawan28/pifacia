@extends("admin.index")

@section("title")
    {{ ucfirst("kategori_produk") }}
@endsection

@section("main")
<a href="{{ route("kategori_produk.create") }}" class="btn btn-primary btn-sm">Tambah</a>
<a href="{{ route("kategori_produk-import") }}" class="btn btn-success btn-sm">Impor</a>
<div class="table-responsive">
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("produk") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori_produks as $kategori_produk)
            <tr>
                <td>{{ $kategori_produk->id }}</td>
                <td>{{ $kategori_produk->name }}</td>
                <td>
                    @foreach ($kategori_produk->produk as $produk)
                        <li>{{ $produk->name }}</li>
                    @endforeach
                </td>
                <td>
                    <div class="btn-group" kategori_produk="group" aria-label="Action">
                        <form action="{{ route("kategori_produk.destroy", $kategori_produk->id) }}" method="POST">
                            @csrf @method("DELETE")
                            <a href="{{ route("kategori_produk.edit", $kategori_produk->id) }}" type="button" class="btn btn-secondary btn-sm">Edit</a>
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
