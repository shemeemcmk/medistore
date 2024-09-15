<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('frontend.auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration(): View
    {
        return view('frontend.auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
{
    // Validate incoming request
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'user_type' => 'required', // Add validation for user type
    ]);

    // Set the role_id based on user_type
    $role_id = $request->input('user_type') === 'Normal User' ? 2 : 3;

    // Include the role_id in the data array
    $data = $request->all();
    $data['role_id'] = $role_id;

    // Create the user with the passed data
    $check = $this->create($data);

    return redirect('home')->withSuccess('Great! You have successfully registered and logged in');
}
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard(): RedirectResponse
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("home")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role_id' => $data['role_id'], // Ensure role_id is set here
    ]);
}
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return Redirect('');
    }
}
