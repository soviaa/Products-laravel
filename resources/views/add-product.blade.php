<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
</head>
<body>
    <form action="{{ route('store-product') }}" method="POST">
        @csrf
        <label for="title">Product Title</label>
        <input type="text" name="title" id="title">

        <label for="price">Price</label>
        <input type="text" name="price" id="price">

        <label for="status">Status</label>
        <input type="checkbox" name="status" id="status" value="1">

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1">

        <label for="order">Order</label>
        <input type="number" name="order" id="order" value="0" min="0">

        <label for="category">Category</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
