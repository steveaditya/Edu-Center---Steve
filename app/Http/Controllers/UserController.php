<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function index(){
        $courses = Course::paginate(3);
        $mathMentors = User::where('specialty', 'Mathematics')->paginate(3, ['*'], 'mathPage');
        $computerMentors = User::where('specialty', 'Computer')->paginate(3, ['*'], 'computerPage');
        return view('utama', compact('courses','mathMentors', 'computerMentors'));
    }

    public function tentangKami(){
        return view('tentang-kami');
    }
    public function hubungiKami(){
        return view('hubungi-kami');
    }

    public function indexMentor(){
        $mathMentors = User::where('specialty', 'Mathematics')->paginate(3, ['*'], 'mathPage');
        $computerMentors = User::where('specialty', 'Computer')->paginate(3, ['*'], 'computerPage');
        return view('cari-mentor', compact('mathMentors', 'computerMentors'));
    } 

    public function pilih_jadwal(Request $request, $id)
    {
        $viewMentor = User::find($id);

        return view('pilih-jadwal',compact('viewMentor'));
    }

    public function jadwal(Request $request, $id)
    {
        $viewMentor = User::with('schedules')->findOrFail($id);

        return view('pilih-jadwal', compact('viewMentor'));
    }
    
    public function link_zoom(Request $request, $id){
        $viewMentor = User::find($id);
        return view('link-zoom',compact('viewMentor'));
    }   


}