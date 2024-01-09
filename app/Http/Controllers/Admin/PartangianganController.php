<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jemaat;
use App\Models\Sektor;
use Illuminate\Http\Request;
use App\Models\Partangiangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartangianganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getKeluargaBySektor(Request $request)
    {
        $sektorId = $request->sektorId;

        // Ambil data keluarga berdasarkan sektor yang dipilih
        $keluarga = Jemaat::where('sektor', $sektorId)->get();

        return response()->json($keluarga);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sektor = Sektor::get();
        $keluarga = Jemaat::get();
        $p = new Partangiangan;

        return view('pages.admin.jemaat.addPartangiangan', compact('p','sektor','keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(),[
            'sektor' => 'required',
            'alamat' => 'required',
            'keluarga' => 'required',
            'tanggal' => 'required',
            'path' => 'required|file',
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 

        $file = $request->file('path');
        $extension = $file->getClientOriginalExtension();
        $filename = 'partangiangan_' . $request->tanggal . '.' . $extension;
        $path = $file->storeAs('partangiangan', $filename);

        $partangiangan = new Partangiangan();
        $partangiangan->sektor = $request->sektor;
        $partangiangan->alamat = $request->alamat;
        $partangiangan->keluarga = $request->keluarga;
        $partangiangan->tanggal = $request->tanggal;
        $partangiangan->path = $path;
        $partangiangan->created_by = Auth::user()->id;
        $partangiangan->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('success', 'Jadwal Partangiangan Berhasil Ditambahkan');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('success', 'Jadwal Partangiangan Berhasil Ditambahkan');            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ibadah = Partangiangan::findOrFail($id);

        // Pastikan file path ada sebelum mengaksesnya
        if ($ibadah->path) {
            return Storage::download($ibadah->path);
        }

        // Tindakan jika file path tidak ada
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sektor = Sektor::get();
        $keluarga = Jemaat::get();
        $p = Partangiangan::findOrFail($id);
        return view('pages.admin.jemaat.addPartangiangan', compact('p','sektor','keluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(),[
            'sektor' => 'required',
            'alamat' => 'required',
            'keluarga' => 'required',
            'tanggal' => 'required',
            'path' => 'required|file',
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
        $partangiangan = Partangiangan::findOrFail($id);
        $partangiangan->sektor = $request->sektor;
        $partangiangan->alamat = $request->alamat;
        $partangiangan->keluarga = $request->keluarga;
        $partangiangan->tanggal = $request->tanggal;
        $partangiangan->updated_by = Auth::user()->id;

        if ($request->hasFile('path')) {
            // Hapus file lama jika ada
            if ($partangiangan->path) {
                Storage::delete($partangiangan->path);
            }

            $file = $request->file('path');
            $extension = $file->getClientOriginalExtension();
            $filename = 'partangiangan_' . $request->tanggal . '.' . $extension;
            $path = $file->storeAs('partangiangan', $filename);
            $partangiangan->path = $path;
        }

        $partangiangan->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('success', 'Jadwal Partangiangan Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('success', 'Jadwal Partangiangan Berhasil Diedit');            
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partangiangan = Partangiangan::findOrFail($id);

        // Hapus file terkait jika ada
        if ($partangiangan->path) {
            Storage::delete($partangiangan->path);
        }

        $partangiangan->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('sdelete', 'Jadwal Partangiangan Berhasil Dihapus');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('sdelete', 'Jadwal Partangiangan Berhasil Dihapus');            
        }
    }
}
