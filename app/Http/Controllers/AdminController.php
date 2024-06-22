<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdminindex()
    {
        return view('admin.index');
    }

    public function  viewEnquiries()
    {
        
        $contact = contact::all();
        return view('admin.contact.contact', compact('contact'));
         
    }
}
