<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function viewCategory()
    {

        $category = Category::all();
        return view('admin.category.category', compact('category'));

    }
    public function CategoryAddform()
    {
        return view('admin.category.category_add',);
    }
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'catagorie_name' => 'required',
            'image' => 'required',
        
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors(), 'formErrors');
        }

        // dd($request->all());
        $category = new Category();


        $category->catagorie_name = $request->catagorie_name;


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/category';
            $uplaod = $file->move($path, $fileName);
            $category->image = '/uploads/category/' . $fileName;
        }



        $category->save();

        session()->flash('success', 'Data Added Successfully.');


        return redirect()->route('view-category');

    }
    public function CategoryEditform($id)
    {
        $category = Category::find($id);
        return view('admin.category.category_edit', compact('category'));
    }

    public function updatecategory(Request $request)
    {
        $category = Category::where('id', $request->category_id)->first();

        if ($request->has('catagorie_name') && $request->filled("catagorie_name")) {
            $category->catagorie_name = $request->catagorie_name;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $fileName = time() . '.' . $extension;
            $path = public_path() . '/uploads/category';
            $uplaod = $file->move($path, $fileName);
            $category->image = '/uploads/category/' . $fileName;
        }

        $category->save();
        session()->flash('success', 'Data Updated Successfully.');
        return redirect()->route('view-category');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success', 'Data Deleted Successfully.');
        return redirect()->back();
    }
}
