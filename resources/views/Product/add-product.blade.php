<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <form action="{{ route('store-product') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96 space-y-4">
        @csrf
        <h1 class="text-2xl font-bold text-center">Add Product</h1>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Product Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('price')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="status" id="status" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="status" class="text-sm font-medium text-gray-700">Available</label>
        </div>

        <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        </div>

        <div>
            <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
            <input type="number" name="order" id="order" value="0" min="0" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category_id" id="category_id" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-md shadow-sm">
            Add Product
        </button>
    </form>

</body>
</html>
