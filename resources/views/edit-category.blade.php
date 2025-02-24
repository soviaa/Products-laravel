<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 w-1/2">

    <form action="{{ route('update-category', ['id' => $category->id]) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-80 space-y-4">
        @csrf
        <h1 class="text-xl font-bold text-center">Edit Category</h1>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="title" id="title" value="{{ $category->title }}" class="mt-1 w-full border-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-md shadow-sm">
            Update Category
        </button>
    </form>

</body>
</html>
