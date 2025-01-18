@extends('layouts.app')

@section('content')
    <h1 class="text-center">Product Management</h1>
    <form method="GET" class="row mb-4">
    <div class="col-md-4 mb-2">
        <input type="text" name="search" class="form-control" placeholder="Search by ID, name, price, or description" value="{{ request('search') }}">
    </div>
    <div class="col-md-3 mb-2">
        <select name="sort_by" class="form-select">
            <option value="">Sort By</option>
            <option value="name">Name</option>
            <option value="price">Price</option>
        </select>
    </div>
    <div class="col-md-2 mb-2">
        <select name="sort_direction" class="form-select">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100 mb-2">Apply</button>
        <a href="{{ route('products.create') }}" class="btn btn-dark w-100">Add New Product</a>
    </div>
</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Product ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->product_id }}</td>
                    <td><img src="{{ asset($product->image) }}" alt="Image" style="width: 50px; height: 50px;"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="View Product">
        <i class="fas fa-eye"></i>
    </a>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Edit Product">
        <i class="fas fa-edit"></i>
    </a>
    <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Delete Product">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No products found</td>
                </tr>
            @endforelse
            <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

        </tbody>
    </table>
    {{ $products->links() }}
@endsection
