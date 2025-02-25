<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 p-8 w-[800px] flex items-center">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Product List</h1>
            <a href="{{ route('add-product') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Add Product
            </a>
        </div>
    <div class="overflow-x-auto">
    <table>
        <tr class="bg-gray-200 text-gray-700">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Price</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2">Order</th>
            <th class="px-4 py-2">Category</th>
            <th class="px-4 py-2" colspan="2">Actions</th>
        </tr>
        @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2 text-center">{{ $product->id }}</td>
                            <td class="px-4 py-2">{{ $product->title }}</td>
                            <td class="px-4 py-2">{{ $product->price }}</td>
                            <td class="px-4 py-2">
                                @if ($product->status == 1)
                                    Available

                                @else
                                    Not Available
                                @endif
                            </td>
                            <td class="px-4 py-2 text-center">{{ $product->quantity }}</td>
                            <td class="px-4 py-2 text-center">{{ $product->order }}</td>
                            <td class="px-4 py-2 text-center">{{ $product->category->title }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('edit-product', ['id' => $product->id]) }}"
                                   class="text-yellow-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('delete-product', ['id' => $product->id]) }}"
                                   class="text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
    </table>
    </div>
    </div>
</body>
</html>
