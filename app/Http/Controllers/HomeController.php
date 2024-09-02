<?php

namespace App\Http\Controllers;
use App\Models\contact;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Uproduct;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewIndex()
    {
        $uproducts=Uproduct::all();
        return view('frontend.index', compact('uproducts'));
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
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        return view('frontend.cart', ['cartItems' => $cartItems]);
    }

    public function viewBying()
    {
        $cartItems = Cart::all();
        return view('frontend.byingpage', compact('cartItems'));
    }


    public function viewSuccess()
    {
        $cartItems = Cart::all();
        return view('frontend.success', compact('cartItems'));
    }











    // booking

    public function viewform()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        return view('frontend.forms', compact('user', 'cartItems' ));
    }

    public function addbooking(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'pin' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator->errors(), 'formErrors');
        }



        $booking = new Book();

        $booking->firstname = $request->firstname;
        $booking->lastname = $request->lastname;
        $booking->email = $request->email;
        $booking->country = $request->country;
        $booking->state = $request->state;
        $booking->pin = $request->pin;
        $booking->product_id = $request->product_id;
        $booking->quantity = $request->quantity;


        $booking->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('success');

    }

   



   
}
