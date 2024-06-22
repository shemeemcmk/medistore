<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function viewProducts()
    {
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.catogory')
            ->select('products.*', 'categories.catagorie_name as catogory')
            ->get();
        $category = Category::all();
        return view('admin.product.product', compact('products','category'));

    }

    // product add

    public function productAddform()
    {
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.catogory')
            ->select('products.*', 'categories.catagorie_name as catogory')
            ->get();
        $category = Category::all();
        
        return view('admin.product.product_add', compact('products','category'));
    }


    public function addproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'price' => 'required', 
            'catogory' => 'required',
            'image' => 'required',
            'Rating' => 'required',
        
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors(), 'formErrors');
        }

        // dd($request->all());
        $products = new Product();


        $products->name = $request->name;
        $products->price = $request->price;
        $products->catogory = $request->catogory;
        $products->Rating = $request->Rating;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/product';
            $uplaod = $file->move($path, $fileName);
            $products->image = '/uploads/product/' . $fileName;
        }



        $products->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('view-product');

    }

    public function productEditform($id)
    {
        $products = Product::leftJoin('categories', 'categories.id', '=', 'products.catogory')
            ->select('products.*', 'categories.catagorie_name as catogory')
            // ->get();
            ->find($id);
        $category = Category::all();
       
        return view('admin.product.product_edit', compact('products','category'));
    }

    // product update>>>>>>>>>>>>

    public function updateProduct(Request $request)
    {
        $products = Product::where('id', $request->products_id)->first();

        if ($request->has('name') && $request->filled("name")) {
            $products->name = $request->name;
        }
        if ($request->has('price') && $request->filled("price")) {
            $products->price = $request->price;
        }
        if ($request->has('catogory') && $request->filled("catogory")) {
            $products->catogory = $request->catogory;
        }
        if ($request->has('Rating') && $request->filled('Rating')) {
            $products->Rating = $request->Rating;
        }


         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/products';
            $uplaod = $file->move($path, $fileName);
            $products->image = '/uploads/products/' . $fileName;
        }


        $products->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('view-products');




    }

    // delete products

    public function deleteproduct($id)
    {
        $products = Product::find($id);
        $products->delete();
        session()->flash('success', 'Data Deleted Successfully.');
        return redirect()->back();
    }
}
