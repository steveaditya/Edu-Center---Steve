<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    //

    public function create()
    {
        return view('auth.register'); 
    }

    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        
        // Validate input including role
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'age'=> 'required|numeric',
            'gender' => 'required',
            'password' => 'required|string|min:8|alpha_num|confirmed',
            'role' => 'required|in:mentor,user', 
        ], [
            'name.required' => 'Name must be filled',
            'name.max' => 'Name has a maximum length of 255 characters',
            
            'email.required' => 'Email must be filled',
            'email.email' => 'Email must follow email format',
            'email.unique' => 'Email already exists',
            
            'password.required' => 'Password must be filled',
            'password.alpha_num' => 'Password must contain alphabet or numbers only',
            'password.min' => 'Password minimum length is 8 characters',
            'password.confirmed' => 'Password must be identical to the confirm password field',
            
            'phone_number.required' => 'Phone Number must be filled',
            'phone_number.max' => 'Phone Number has a maximum length of 15 characters',

            'role.required' => 'Role must be selected',
            'role.in' => 'Invalid role selected',
        ]);

        // Create the user
        $user = new User();
        $user->nama = $request->name; // Gunakan 'nama' sesuai dengan tabel database
        $user->email = $request->email;
        $user->nomor_hp = $request->phone_number;
        $user->umur = $request->age; 
        $user->jenis_kelamin = $request->gender; 
        $user->password = Hash::make($request->password);
        $user->role = $request->role; // Save the selected role
        $user->save();

        // Automatically log in the user
        Auth::login($user);

        return redirect()->intended('/');
        // return redirect()->route('/utama');

    }


}
