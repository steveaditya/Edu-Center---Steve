<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\alert;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::paginate(3);
        return view('cari-materi', compact('courses'));
    }

    public function detail_materi(Request $request){
        $courseID = $request->input('id');
        $course = Course::find($courseID);

        if (!$course) {
            return redirect()->back()->with('error', 'Materi tidak ditemukan.');
        }
        
        return view('detail-materi', compact('course'));
    }  

    public function addCourse(){
        return view('tambah-materi');
    }

    public function createCourse(Request $req){
        
        $validateData = $req->validate([
            'nama' => 'required|max:20',
            'kode' => 'required|unique:courses|max:8',
            'deskripsi' => 'required|max:1008',
            'isi' => 'required|max:10008',
            'durasi' => 'required',
            'link' => 'required|max:200',
            'foto' => 'required|image|max:2048',
        ]
        );
        $file = $req->file('foto');
        $imageURL = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/image/Courses', $file, $imageURL);
        $imageURL = 'storage/image/Courses/'.$imageURL;
        $course = new Course();
        $course->nama = $req->nama;
        $course->kode = $req->kode;
        $course->deskripsi = $req->deskripsi;
        $course->isi = $req->isi;
        $course->durasi = $req->durasi;
        $course->link = $req->link;
        $course->foto = $imageURL;

        $course->save();

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan!');

    }

    public function editCourse($kode){
        $course = Course::where('kode', $kode)->firstOrFail();
        return view('edit-materi', compact('course'));
    }

    public function updateCourse(Request $req, $kode){
        $course = Course::where('kode', $kode)->firstOrFail();
        $file = $req->file('foto');
        if($file != null){
            $imageURL = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/image/Courses/', $file, $imageURL);
            $imageURL = 'storage/image/Courses/'.$imageURL;

            $course->foto = $imageURL;
        }
        $validateData = $req->validate([
            'nama' => 'required|max:20',
            'deskripsi' => 'required|max:1008',
            'isi' => 'required|max:10008',
            'durasi' => 'required',
            'link' => 'required|max:200',
        ]
        );
        $course->update($validateData);
        $course->save();
        return redirect('cari-materi')->with('success', 'Materi berhasil diperbarui!');
    }

    public function deleteCourse($kode){
        $course = Course::where('kode', $kode)->firstOrFail();
        if(isset($course)){
            Storage::delete('public/'.$course->foto);
            $course->delete();
        }
        return redirect()->back()->with('success', 'Materi berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $courses = Course::where("nama","LIKE","%$request->search%")->paginate(3);

        return view('cari-materi',compact("courses"));
    }

}
