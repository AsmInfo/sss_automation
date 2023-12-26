<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\UserProfile;

class LoginRegisterController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',

        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        $successMessage = session('success');
        if (Auth::attempt($credentials)) {
              // Get the authenticated user
                
                return redirect()->route('billing')
                ->with('success', $successMessage);
        }
        
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
    public function billing()
    {
        if (Auth::user()) {
            // Get the authenticated user
              $user = Auth::user();
              $data = User::find($user->id);
        }
        return view('orders.billingdetails',compact('data'));

    }

    public function profile(Request $request){
       

       $request->validate([
            
             'mobile' => 'required',
             'door_no' => 'required',
             'street' => 'required',
             'pincode' =>'required',
             'area' =>'required',
             'city'=>'required',
             'state'=>'required',
             'country'=>'required',
             'GST' => 'required|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',
 
 
         ]);

         $data = $request->all();
         UserProfile::create($data);
        // dd( $data);
        return redirect()->route('payment');
     }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
    
   
}
