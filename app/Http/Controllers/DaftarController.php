<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    public function showForm()
    {
        return view('daftar'); 
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'nomor_hp' => 'required|digits_between:10,15',
            'jenis_kelamin' => 'required|in:Male,Female',
            'umur' => 'required|integer|min:1',
        ]);

        // Simpan data ke tabel `users`
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_hp' => $request->nomor_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'role' => 'student', // Default role
        ]);

        // Redirect atau pesan sukses
        return redirect()->route('daftar')->with('success', 'Registrasi berhasil!');
    }
}
