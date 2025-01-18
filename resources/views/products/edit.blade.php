<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}" required><br>
    <textarea name="description">{{ $product->description }}</textarea><br>
    <input type="number" name="price" value="{{ $product->price }}" required><br>
    <input type="number" name="stock" value="{{ $product->stock }}"><br>
    <input type="file" name="image"><br>
    <button type="submit">Update Product</button>
</form>
