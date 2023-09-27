<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Http\Request;

class ApiAbsenController extends Controller
{
    public function store_absen(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'jam_masuk' => 'required',
        ]);

        $store = new Absen();
        $store->student_id = $request->student_id;
        $store->jam_masuk = $request->jam_masuk;
        $store->jam_keluar = $request->jam_keluar;
        $store->keterangan = $request->keterangan;
        $store->save();


        // $store = Absen::create($request->all());
        return response()->json($store);
    }
}
