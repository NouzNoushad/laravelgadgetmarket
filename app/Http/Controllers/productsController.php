<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\User;

class productsController extends Controller
{
    // get products from database
    public function getProducts(){

        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    // insert products data into the database
    public function setProductsData(Request $req){

        $req->validate([
            "name" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "category" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "brand" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "price" => "required | min:0 | max:12",
            "file" => "required | mimes:jpg,jpeg,webp,gif,png | max:200000" 
        ]);
        $product = new Product;
        $product->name = $req->name;
        $product->category = $req->category;
        $product->brand = $req->brand;
        $product->price = $req->price;
        if($req->hasFile('file')){
            $destination = 'public/uploads';
            $image = uniqid('', true) . '.' . $req->file('file')->guessClientExtension();
            $req->file('file')->storeAs($destination, $image);
            $product->image = $image;
        }
        $product->save();
        $req->session()->flash('status', 'New product data has been added successfully');
        return redirect('/');
    }

    // find product details using id from database
    public function getProductData($id){

        $product = Product::find($id);
        return view('details', ['product' => $product]);
    }

    // find product from database by id
    public function getEditData($id){

        $product = Product::find($id);
        return view('edit', ['product' => $product]);
    }

    // edit product data in the database
    public function editProductData(Request $req){

        $req->validate([
            "name" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "category" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "brand" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "price" => "required | min:0 | max:12",
            "file" => "mimes:jpg,png,jpeg,webp,gif | max:200000"
        ]);
        $product = Product::find($req->id);
        $product->name = $req->name;
        $product->category = $req->category;
        $product->brand = $req->brand;
        if($req->hasFile('file')){
            $destination = 'public/uploads';
            $image = uniqid('', true) . $req->file('file')->guessClientExtension();
            // delete old image file
            Storage::disk('public')->delete('uploads/'. $product->image);
            // store new image file
            $path = $req->file('file')->storeAs($destination, $image);
            $product->image = $image;
        }
        $product->save();
        $req->session()->flash('status', 'Product data has been updated successfully');
        return redirect('/');
    }

    // delete product data from database
    public function deleteProductData($id){

        $product = Product::find($id);
        Storage::disk('public')->delete('uploads/'. $product->image);
        $product->delete();
        
        Session::flash('status', 'Product data has been deleted successfully');
        return redirect('/');
    }

    // insert user data into the database
    public function registerUser(Request $req){

        $req->validate([

            "name" => array("required", "regex:/^[a-zA-Z0-9\s]+$/"),
            "email" => "required | email | unique:users,email",
            "password" => "required | min:5",
            "cpassword" => "required | min:5 | same:password",
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        $req->session()->put('user', $req->name);
        return redirect('/');
    }

    // login user by using email 
    public function loginUser(Request $req){

        $req->validate([

            "email" => "required | email",
            "password" => "required | min:5"
        ]);

        $user = User::where('email', $req->email)->get();
        if(Hash::check($req->password, $user[0]->password)){
            $req->session()->put('user', $user[0]->name);
            return redirect('/');
        }
        else{
            $req->session()->flash('status', 'Invalid password');
            return redirect('/login');
        }
    }

    // logout user 
    public function logoutUser(){

        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('/');
    }
}
