@extends('admin.index')

@section('content')

<h1>List Products</h1>
<a href="{{ route('product.create') }}" class="btn btn-primary">Tambah Produk</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Gambar</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="w-100" style="max-width: 100px;">
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="/admin/product/{{ $product->id }}/edit" class="btn btn-warning me-2">edit</a>
                    <form action="/admin/product/{{ $product->id }}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button href="/admin/product/{{ $product->id }}/delete" class="btn btn-danger">delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
