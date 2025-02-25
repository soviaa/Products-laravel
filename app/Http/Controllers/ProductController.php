<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function getProduct(){
        $products = Product::orderBy('quantity', 'desc')->with('category')->get();
        return view('product.product',compact('products'));
    }

    public function addProduct(){
        $categories = Category::all();
        return view('product.add-product', compact('categories'));
    }

    public function storeProduct(Request $request){

            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255|regex:/^[a-zA-Z ]+$/u',
                'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'status' => 'nullable|boolean',
                'quantity' => 'required|numeric|min:1',
                'order' => 'nullable|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ],[
                'title.required' => 'The product title is required.',
                'title.regex' => 'The title should not contain special characters.',
                'title.unique' => 'This product title already exists.',
                'price.required' => 'The product price is required.',
                'price.regex' => 'The price should be a number with up to 2 decimal places.',
                'quantity.required' => 'The product quantity is required.',
                'quantity.min' => 'The product quantity should be at least 1.',
                'category_id.required' => 'The category is required.',
                'category_id.exists' => 'The selected category does not exist.',
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

    }

    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit-product',compact('product','categories'));
    }

    public function updateProduct(Request $request,$id){

            $validatedData = $request->validate([
                'title' => 'sometimes|unique:categories|max:255|regex:/^[a-zA-Z ]+$/u',
                'price' => 'sometimes|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'status' => 'nullable|boolean',
                'quantity' => 'sometimes|numeric|min:1',
                'order' => 'nullable|numeric|min:0',
                'category_id' => 'sometimes|exists:categories,id',

            ],[
                'title.required' => 'The product title is required.',
                'title.regex' => 'The title should not contain special characters.',
                'title.unique' => 'This product title already exists.',
                'price.required' => 'The product price is required.',
                'price.regex' => 'The price should be a number with up to 2 decimal places.',
                'quantity.required' => 'The product quantity is required.',
                'quantity.min' => 'The product quantity should be at least 1.',
                'category_id.required' => 'The category is required.',
                'category_id.exists' => 'The selected category does not exist.',
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
