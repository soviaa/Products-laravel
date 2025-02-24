<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Quantity</th>
            <th>Order</th>
            <th>Category</th>
            <th colspan="2"><a href="{{route('add-product')}}">Add Product</a></th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->status }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->Order }}</td>
                <td>{{ $product->category_id }}</td>
                <td><a href="{{route('edit-product', ['id' => $product->id])}}">Edit</a></td>
                <td><a href="{{route('delete-product',['id' => $product->id])}}">Delete</a></td>
            </tr>

        @endforeach
    </table>
</body>
</html>
