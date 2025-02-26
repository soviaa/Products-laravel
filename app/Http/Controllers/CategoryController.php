<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory(){
        $categories = Category::orderBy('created_at','desc')->get();
        return view('category.category',compact('categories'));
    }

    public function addCategory(){
        return view('category.add-category');
    }

    public function storeCategory(Request $request){
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255|regex:/^[a-zA-Z]+$/u',
            ],
                [
                    'title.required' => 'The category title is required.',
                    'title.regex' => 'The title should not contain special characters.',
                    'title.unique' => 'This category title already exists.',
                ]);

            $category = new Category();
            $category->title = $request->title;
            $category->save();

            return redirect('categories')->with('success','Category added successfully');

    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('category.edit-category',compact('category'));
    }

    public function updateCategory(Request $request,$id){

        $category = Category::find($id);


        if (!$request->filled('title') || $request->title === $category->title) {
            return redirect('categories')->with('info', 'No changes were made to the category.');
        }

            $validatedData = $request->validate([
                'title' => 'sometimes|unique:categories|max:255|regex:/^[a-zA-Z ]+$/u',
            ],
                [
                    'title.regex' => 'The title should not contain special characters.',
                    'title.unique' => 'This category title already exists.',
            ]);

            $category = Category::find($id);
            $category->title = $request->title;
            $category->save();

            return redirect('categories')->with('success','Category updated successfully');
    }

    public function deleteCategory($id){

            $category = Category::find($id);
            $category->delete();

            return redirect('categories')->with('success','Category deleted successfully');
    }
}
