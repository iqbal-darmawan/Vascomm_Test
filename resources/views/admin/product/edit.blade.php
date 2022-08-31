@extends('admin.index')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
        <form action="/admin/product/{{ $product->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $product->name}}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') ?? $product->description}}">
                @error('description')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="" class="mt-4" style="max-width: 600px;">
                @endif
                @error('image')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
