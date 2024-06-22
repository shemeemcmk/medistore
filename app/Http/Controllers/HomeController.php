<?php

namespace App\Http\Controllers;
use App\Models\contact;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewIndex()
    {
        return view('frontend.index');
    }
    public function viewProducts($id)
    {
        $category = Category::Where('id' ,$id)->first();
        $products = Product::where('catogory' ,$id)->get();
        return view('frontend.products', compact('products','category'));
    }

    

    public function viewcontact()
    {
        return view('frontend.contact');
    }
    
    public function viewBook()
    {
        return view('frontend.booknow');
    }
    public function viewcategories()
    {
        $category=Category::all();
        return view('frontend.catogories', compact('category'));
    }

    public function addContact(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'messege' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator->errors(), 'formErrors');
        }

        $contact = new contact();

        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->messege = $request->messege;


        $contact->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('home');

    }
    public function viewProductdetials()
    {
        $products=Product::all();
        return view('frontend.productdetials', compact('products'));
    }

    public function viewcart()
    {
        return view('frontend.cart');
    }

   



   
}
