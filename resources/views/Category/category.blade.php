<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 w-1/3 justify-center flex items-center">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Category List</h1>
            <a href="{{ route('add-category') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Add Category
            </a>
        </div>
    <div class="overflow-x-auto">
    <table>
        <tr class="bg-gray-200 text-gray-700">
            <th class="px-4 py-2">Category ID</th>
            <th class="px-4 py-2">Category Name</th>
            <th class="px-4 py-2" colspan="2">Actions</a></th>
        </tr>
        @foreach ($categories as $category)
        <tr class="border-b hover:bg-gray-100">
            <td class="px-4 py-2 text-center">{{ $category->id }}</td>
            <td class="px-4 py-2 text-center">{{ $category->title }}</td>
            <td class="px-4 py-2 text-center"><a class="text-yellow-500 hover:underline" href="{{route('edit-category', ['id' => $category->id])}}">Edit</a></td>
            <td class="px-4 py-2 text-center"><a class="text-red-500 hover:underline" href="{{route('delete-category',['id' => $category->id])}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
    </div>
    </div>
</body>
</html>
