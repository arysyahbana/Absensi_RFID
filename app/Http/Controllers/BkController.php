<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class BkController extends Controller
{
    public function show_bk()
    {
        $student = Student::where('alfa', 3)->orWhere('terlambat', 3)->get();
        return view('bk.bk_show', compact('student'));
    }

    public function restore_acc($id)
    {
        $student = Student::where('id', $id)->first();
        if ($student->alfa == 3) {
            $student->alfa = 0;
            $student->update();
        } else {
            $student->terlambat = 0;
            $student->update();
        }
        return back();
    }
}
