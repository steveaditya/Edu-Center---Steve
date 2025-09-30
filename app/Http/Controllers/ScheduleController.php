<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function tambah_jadwal(Request $request){
        $validateData = $request->validate([
            'kode_mentor' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        Schedule::create($validateData);
        return redirect('/')->with('success', 'Jadwal anda sudah ditambah');
    }
}
