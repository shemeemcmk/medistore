<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Middleware to restrict access to only users with role_id 1 (super admin) and 3 (delivery boys)
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)) {
                return $next($request); // Proceed to requested page
            }
            return redirect('/home')->withErrors('You do not have access to this page.');
        });
    }

    // Admin index page view
    public function viewAdminindex()
    {
        return view('admin.index');
    }

    // View enquiries for admin
    public function viewEnquiries()
    {
        $contact = contact::all();
        return view('admin.contact.contact', compact('contact'));
    }

    // View bookings for admin
    public function viewbookings()
    {
        $booking = Book::all();
        return view('admin.booking.bookings', compact('booking'));
    }
}
