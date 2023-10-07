<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Student;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function show_absen()
    {
        $absen = Absen::latest()->with('rStudent')->get();
        return view('absen.absen_show', compact('absen'));
    }

    public function show_absen_tkj()
    {
        $absen_tkj = Absen::latest()->whereHas('rStudent', function ($query) {
            $query->where('jurusan', 'TJKT');
        })->with('rStudent')->get();
        return view('absen.tkj.tkj_show', compact('absen_tkj'));
    }

    public function show_absen_tkj_by_kelas($kelas)
    {
        $kelas_tkj = Absen::whereHas('rStudent')->get();
        return response()->json($kelas_tkj);
    }

    public function show_absen_tkr()
    {
        $absen_tkr = Absen::latest()->whereHas('rStudent', function ($query) {
            $query->where('jurusan', 'TKR');
        })->with('rStudent')->get();
        return view('absen.tkr.tkr_show', compact('absen_tkr'));
    }

    public function show_absen_dpib()
    {
        $absen_dpib = Absen::latest()->whereHas('rStudent', function ($query) {
            $query->where('jurusan', 'DPIB');
        })->with('rStudent')->get();
        return view('absen.dpib.dpib_show', compact('absen_dpib'));
    }

    public function show_absen_titl()
    {
        $absen_titl = Absen::latest()->whereHas('rStudent', function ($query) {
            $query->where('jurusan', 'TITL');
        })->with('rStudent')->get();
        return view('absen.titl.titl_show', compact('absen_titl'));
    }

    // public function create_absen()
    // {
    //     return view('absen.absen_create');
    // }

    // public function store_absen()
    // {
    // }

    public function edit_absen($id)
    {
        $edit = Absen::where('id', $id)->with('rStudent')->first();
        return view('absen.absen_edit', compact('edit'));
    }

    public function update_absen(Request $request, $id)
    {
        $update = Absen::where('id', $id)->first();
        // $request->validate([
        //     'jam_masuk' => 'required',
        //     'jam_keluar' => 'required',
        // ]);

        $update->jam_masuk = $request->masuk;
        $update->jam_keluar = $request->keluar;
        $update->keterangan = $request->keterangan;
        $update->update();
        return redirect()->route('absen');
    }

    public function delete_absen($id)
    {
        $delete = Absen::where('id', $id)->first();
        $delete->delete();
        return redirect()->route('absen');
    }
}
