<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function show_student()
    {
        $student = Student::all();
        return view('student.student_show', compact('student'));
    }

    public function create_student()
    {
        $uid = session('uid', '');
        return view('student.student_create', ['uid' => $uid]);
    }

    public function store_student(Request $request)
    {
        $request->validate([
            'uid' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        $store = new Student();
        $store->uid = $request->uid;
        $store->name = $request->nama;
        $store->nis = $request->nis;
        $store->kelas = $request->kelas;
        $store->jurusan = $request->jurusan;
        $store->save();
        return redirect()->route('student');
    }

    public function edit_student($id)
    {
        $edit = Student::where('id', $id)->first();
        return view('student.student_edit', compact('edit'));
    }

    public function update_student(Request $request, $id)
    {
        $update = Student::where('id', $id)->first();
        $request->validate([
            'uid' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);

        $update->uid = $request->uid;
        $update->name = $request->nama;
        $update->nis = $request->nis;
        $update->kelas = $request->kelas;
        $update->jurusan = $request->jurusan;
        $update->update();
        return redirect()->route('student');
    }

    public function delete_student($id)
    {
        $delete = Student::where('id', $id)->first();
        $delete->delete();
        return redirect()->route('student');
    }

    public function naik_kelas()
    {
        $student = Student::whereIn('kelas', ['X', 'XI', 'XII'])->get();

        $student->each(function ($student) {
            if ($student->kelas == 'XII') {
                $student->kelas = 'Lulus';
            } elseif ($student->kelas == 'XI') {
                $student->kelas = 'XII';
            } elseif ($student->kelas == 'X') {
                $student->kelas = 'XI';
            }

            $student->save();
        });
        return back();
    }
}
