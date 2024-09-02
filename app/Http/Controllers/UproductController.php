<?php

namespace App\Http\Controllers;
use App\Models\Uproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UproductController extends Controller
{
   public function viewUproducts()
   {
       $uproducts = Uproduct::all();
       return view('admin.Uproduct.Uproduct', compact('uproducts'));
   }
   public function viewUproductAddform()
   {
       return view('admin.uproduct.uproduct_add');
   }
   public function addUproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'price' => 'required', 
            'image' => 'required',
            'rating' => 'required',
        
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors(), 'formErrors');
        }

        // dd($request->all());
        $uproducts = new Uproduct();


        $uproducts->name = $request->name;
        $uproducts->price = $request->price;
        $uproducts->rating = $request->rating;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/uproducts';
            $uplaod = $file->move($path, $fileName);
            $uproducts->image = '/uploads/uproducts/' . $fileName;
        }



        $uproducts->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('view-uproduct');

    }
    public function UproductEditform($id)
    {
        $uproducts = Uproduct::find($id);
        return view('admin.uproduct.Uproduct_edit', compact('uproducts'));
    }

    public function updateUproduct(Request $request)
    {
        $uproducts = Uproduct::where('id', $request->uproducts_id)->first();

        if ($request->has('name') && $request->filled("name")) {
            $uproducts->name = $request->name;
        }
        if ($request->has('price') && $request->filled("price")) {
            $uproducts->price = $request->price;
        }
        if ($request->has('Rating') && $request->filled('Rating')) {
            $uproducts->rating = $request->rating;
        }


         if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/products';
            $uplaod = $file->move($path, $fileName);
            $uproducts->image = '/uploads/uproducts/' . $fileName;
        }


        $uproducts->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('view-uproduct');




    }
    public function deleteUproduct($id)
    {
        $uproducts = Uproduct::find($id);
        $uproducts->delete();
        session()->flash('success', 'Data Deleted Successfully.');
        return redirect()->back();
    }

   
}
