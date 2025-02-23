<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProduct(){
        $products = Product::all();
        return view('product',compact('products'));
    }

    public function addProduct(){
        return view('add-product');
    }

    public function storeProduct(Request $request){
        try{
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255|regex:/^[a-zA-Z]+$/u',
            ]);

            $product = new Product();
            $product->title = $request->title;
            $product->save();


            return redirect('products')->with('success','Product added successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function editProduct($id){
        $product = Product::find($id);
        return view('edit-product',compact('product'));
    }

    public function updateProduct(Request $request,$id){
        try{
            $validatedData = $request->validate([
                'title' => 'required|unique:categories|max:255|regex:/^[a-zA-Z]+$/u',
            ]);

            $product = Product::find($id);
            $product->title = $request->title;
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

            return redirect('product')->with('success','Product deleted successfully');

        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
