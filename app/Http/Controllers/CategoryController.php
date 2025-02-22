<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory(){
        $categories = Category::all();
        return view('category',compact('categories'));
    }

    public function addCategory(){
        return view('add-category');
    }

    public function storeCategory(Request $request){
        try{
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255',
            ]);

            $category = new Category();
            $category->title = $request->title;
            $category->save();


            return redirect('categories')->with('success','Category added successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('edit-category',compact('category'));
    }

    public function updateCategory(Request $request,$id){
        try{
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255',
            ]);

            $category = Category::find($id);
            $category->title = $request->title;
            $category->save();

            return redirect('categories')->with('success','Category updated successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function deleteCategory($id){
        try{
            $category = Category::find($id);
            $category->delete();

            return redirect('categories')->with('success','Category deleted successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
