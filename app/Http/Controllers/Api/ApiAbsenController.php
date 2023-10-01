<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiAbsenController extends Controller
{
    public function masuk(Request $request)
    {
        $request->validate([
            'uid' => 'required'
        ]);
        $ket = "Hadir";
        $student = Student::where('uid', $request->uid)->first();
        $now = Carbon::now();
        $tgl = $now->format('Y-m-d H:i');

        if ($now->hour > 7) {
            $ket = "Terlambat";
        }

        $store = new Absen();
        $store->student_id = $student->id;
        $store->jam_masuk = $tgl;
        // $store->jam_keluar = $request->jam_keluar;
        $store->keterangan = $ket;
        $store->save();


        // $store = Absen::create($request->all());
        return response()->json($student->name);
    }

    public function keluar(Request $request)
    {
        $request->validate([
            'uid' => 'required'
        ]);
        $today = Carbon::today();
        $student = Student::where('uid', $request->uid)->first();
        $now = Carbon::now();
        $tgl = $now->format('Y-m-d H:i');

        $store = Absen::where('jam_masuk', $today);
        $store->student_id = $student->id;
        // $store->jam_masuk = $tgl;
        $store->jam_keluar = $request->jam_keluar;
        // $store->keterangan = "Pulang";
        $store->update();


        // $store = Absen::create($request->all());
        return response()->json($store);
    }

    public function cekSiswa(Request $request)
    {
        $request->validate([
            'uid' => 'required'
        ]);
        $murid = Student::where('uid', $request->uid)->first();
        if ($murid == null) {
            return response()->json("Murid tidak ditemukan");
        } else {
        }
    }
}
