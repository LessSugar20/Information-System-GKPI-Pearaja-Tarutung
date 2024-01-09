<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ibadah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $i = new Ibadah;
        return view('pages.admin.jemaat.addIbadah', compact('i'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validators = Validator::make($request->all(),[
            'nama' => 'required',
            'tanggal' => 'required|date',
            'path' => 'required|file',
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 

        $ibadah = new Ibadah();
        $ibadah->nama = $request->nama;
        $ibadah->tanggal = $request->tanggal;
        $ibadah->created_by = Auth::user()->id;
        
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $extension = $file->getClientOriginalExtension();
            $fileName = $request->nama . '_' . $request->tanggal . '.' . $extension;
            $path = $file->storeAs('ibadah', $fileName);
            $ibadah->path = $path;
        }

        $ibadah->save();

        
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('success', 'Jadwal Ibadah Berhasil Ditambahkan');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('success', 'Jadwal Ibadah Berhasil Ditambahkan');            
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ibadah = Ibadah::findOrFail($id);

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
        $i = Ibadah::findOrFail($id);
        return view('pages.admin.jemaat.addIbadah', compact('i'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validators = Validator::make($request->all(),[
            'nama' => 'required',
            'tanggal' => 'required|date',
            'path' => 'required|file',
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 

        $ibadah = Ibadah::findOrFail($id);
        $ibadah->nama = $request->nama;
        $ibadah->tanggal = $request->tanggal;
        $ibadah->updated_by = Auth::user()->id;

        // Jika ada berkas yang diunggah
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $extension = $file->getClientOriginalExtension();
            $fileName = $request->nama . '_' . $request->tanggal . '.' . $extension;

            // Hapus file lama jika ada
            if ($ibadah->path) {
                Storage::delete($ibadah->path);
            }

            $path = $file->storeAs('ibadah', $fileName);
            $ibadah->path = $path;
        }

        $ibadah->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('success', 'Jadwal Ibadah Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('success', 'Jadwal Ibadah Berhasil Diedit');            
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ibadah $ibadah, $id)
    {
        $ibadah = Ibadah::findOrFail($id);

        // Hapus file terkait jika ada
        if ($ibadah->path) {
            Storage::delete($ibadah->path);
        }

        $ibadah->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jadwal')->with('sdelete', 'Jadwal Ibadah Berhasil Dihapus');            
        }else{
            return redirect('sek/jemaat/jadwal')->with('sdelete', 'Jadwal Ibadah Berhasil Dihapus');            
        }

    }
}
