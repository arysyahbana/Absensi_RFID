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

        $student = Student::where('uid', $request->uid)->first();

        if ($student === null) {
            return response()->json([
                'nama' => "unknown card",
                'ket' => "Not found"
            ]);
        }

        $now = Carbon::now();
        $today = Carbon::today();
        $tgl = $now->format('Y-m-d H:i');
        $ket = ($now->hour > 7) ? "Terlambat" : "Hadir";

        $absen = Absen::where('student_id', $student->id)
            ->whereDate('jam_masuk', $today)
            ->first();

        if ($absen) {
            return response()->json([
                'nama' => $student->name,
                'ket' => 'Sudah Ambil Absen'
            ]);
        }

        if ($student->alfa == 3 || $student->terlambat == 3) {
            $response = [
                'nama' => $student->name,
                'ket' => 'Tidak Bisa Ambil Absen, Silahkan Pergi ke Ruang BK'
            ];
        } else {
            if ($ket == 'Terlambat') {
                $student->terlambat = $student->terlambat + 1;
                $student->update();
            }

            $store = new Absen([
                'student_id' => $student->id,
                'jam_masuk' => $tgl,
                'keterangan' => $ket
            ]);
            $store->save();

            $response = [
                'nama' => $student->name,
                'ket' => $ket
            ];
        }

        return response()->json($response);
    }


    public function keluar(Request $request)
    {
        $request->validate([
            'uid' => 'required'
        ]);

        $student = Student::where('uid', $request->uid)->first();

        if ($student === null) {
            return response()->json([
                'nama' => "unknown card",
                'ket' => "Not found"
            ]);
        }

        $today = Carbon::today();
        $now = Carbon::now();
        $tgl = $now->format('Y-m-d H:i');

        $store = Absen::where('student_id', $student->id)
            ->whereDate('jam_masuk', $today)
            ->first();

        if (!$store) {
            return response()->json([
                'nama' => $student->name,
                'ket' => 'Belum Absen Masuk'
            ]);
        }
        if ($store->jam_keluar) {
            return response()->json([
                'nama' => $student->name,
                'ket' => 'Sudah Ambil Absen'
            ]);
        }

        $store->jam_keluar = $tgl;
        $store->update();

        return response()->json([
            'nama' => $student->name,
            'ket' => 'Pulang'
        ]);
    }

    public function izin(Request $request)
    {
        $request->validate([
            'uid' => 'required'
        ]);

        $student = Student::where('uid', $request->uid)->first();

        if ($student === null) {
            return response()->json([
                'nama' => "unknown card",
                'ket' => "Not found"
            ]);
        }

        $today = Carbon::today();
        $now = Carbon::now();
        $tgl = $now->format('Y-m-d H:i');

        $store = Absen::where('student_id', $student->id)
            ->whereDate('jam_masuk', $today)
            ->first();

        if (!$store) {
            return response()->json([
                'nama' => $student->name,
                'ket' => 'Belum Absen Masuk'
            ]);
        }

        $jml_izin = $store->izin = $store->izin + 1;
        $store->update();

        return response()->json([
            'nama' => $student->name,
            'ket' => 'izin ' . $jml_izin
        ]);
    }

    // public function cekSiswa(Request $request)
    // {
    //     $request->validate([
    //         'uid' => 'required'
    //     ]);
    //     $murid = Student::where('uid', $request->uid)->first();
    //     if ($murid == null) {
    //         return response()->json("Murid tidak ditemukan");
    //     } else {
    //         return response()->json("Murid ditemukan");
    //     }
    // }
}
