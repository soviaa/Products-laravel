<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function getProduct(){
        $products = Product::orderBy('quantity','desc')->get();
        return view('product',compact('products'));
    }

    public function addProduct(){
        $categories = Category::all();
        return view('add-product', compact('categories'));
    }

    public function storeProduct(Request $request){
        try{
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255|regex:/^[a-zA-Z]+$/u',
                'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'status' => 'nullable|boolean',
                'quantity' => 'required|numeric|min:1',
                'order' => 'nullable|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ]);
            $product = new Product();
            $product->title = $request->title;
            $product->price = $request->price;
            $product->status = $request->status ?? false;
            $product->quantity = $request->quantity;
            $product->order = $request->order ?? 0;
            $product->category_id = $request->category_id;

            $product->save();

            return redirect('products')->with('success','Product added successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('edit-product',compact('product','categories'));
    }

    public function updateProduct(Request $request,$id){
        try{
            $validatedData = $request->validate([
                'title' => 'nullable|unique:categories|max:255|regex:/^[a-zA-Z]+$/u',
                'price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'status' => 'nullable|boolean',
                'quantity' => 'nullable|numeric|min:1',
                'order' => 'nullable|numeric|min:0',
                'category_id' => 'nullable|exists:categories,id',

            ]);

            $product = Product::find($id);
            $product->title = $request->title;
            $product->price = $request->price;
            $product->status = $request->status ?? false;
            $product->quantity = $request->quantity;
            $product->order = $request->order ?? 0;
            $product->category_id = $request->category_id;
            $product->save();

            return redirect('products')->with('success','Product updated successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function deleteProduct($id){
        try{
            $product = Product::find($id);
            $product->delete();

            return redirect('products')->with('success','Product deleted successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
