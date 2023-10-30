@extends("admin.index")

@section("title")
    {{ ucfirst("produk") }}
@endsection

@section("main")
<a href="{{ route("produk.create") }}" class="btn btn-primary btn-sm">Tambah</a>
<a href="{{ route("produk-import") }}" class="btn btn-success btn-sm">Impor</a>
<div class="table-responsive">
    <br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("uuid") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("supplier") }}</th>
                <th>{{ ucfirst("kategori") }}</th>
                <th>{{ ucfirst("price") }}</th>
                <th>{{ ucfirst("barcode") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
            <tr>
                <td>{{ $produk->uuid }}</td>
                <td>{{ $produk->name }}</td>
                <td>{{ $produk->supplier->name }}</td>
                <td>{{ $produk->kategori_produk->name }}</td>
                <td>{{ $produk->price }}</td>
                <td>
                    <li>Asli : {{ $produk->barcode["barcode_asli"] ?? "-" }}</li>
                    <li>Internal : {{ $produk->barcode["barcode_internal"] ?? "-" }}</li>
                </td>
                <td>
                    <div class="btn-group" produk="group" aria-label="Action">
                        <form action="{{ route("produk.destroy", $produk->uuid) }}" method="POST">
                            @csrf @method("DELETE")
                            <a href="{{ route("produk.edit", $produk->uuid) }}" type="button" class="btn btn-secondary btn-sm">Edit</a>
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
