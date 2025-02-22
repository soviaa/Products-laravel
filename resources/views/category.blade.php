<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>
<body>
    <table>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th colspan="2"><a href="{{route('add-category')}}">Add Category</a></th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td><a href="{{route('edit-category', ['id' => $category->id])}}">Edit</a></td>
                <td><a href="{{route('delete-category',['id' => $category->id])}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
