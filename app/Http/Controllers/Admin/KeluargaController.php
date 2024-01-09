<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jemaat;
use App\Models\Sektor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $kel = Jemaat::get();
        $i = 1;
        return view('pages.admin.jemaat.keluarga', compact('kel','i'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kel = new Jemaat;
        $sek = Sektor::get();
        return view('pages.admin.jemaat.addKeluarga', compact('kel', 'sek'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id' => 'required|unique:jemaat',  
            'ayah' => 'required',
            'ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'sektor' => 'required',
            'masuk_tgl' => 'required',
            'pindah_tgl' => 'nullable',
            'pindah_dari' => 'nullable',
            'pindah_ke' => 'nullable'
        ]);

        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
   
        // dd($request);
        $jemaat = new Jemaat;
        $jemaat->id = $request->id;
        $jemaat->ayah = $request->ayah;
        $jemaat->ibu = $request->ibu;
        $jemaat->sektor = $request->sektor;
        $jemaat->pekerjaan_ayah = $request->pekerjaan_ayah;
        $jemaat->pekerjaan_ibu = $request->pekerjaan_ibu;
        $jemaat->masuk_tgl = $request->masuk_tgl;
        $jemaat->pindah_tgl = $request->pindah_tgl;
        $jemaat->pindah_dari = $request->pindah_dari;
        $jemaat->pindah_ke = $request->pindah_ke;
        $jemaat->created_by = Auth::user()->id;
        $jemaat->save();
   
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keluarga')->with('success', 'Keluarga Berhasil Ditambahkan');            
        }else{
            return redirect('sek/jemaat/keluarga')->with('success', 'Keluarga Berhasil Ditambahkan');            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jemaat $jemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kel = Jemaat::find($id);
        $sek = Sektor::get();
        return view('pages.admin.jemaat.addKeluarga', compact('kel', 'sek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {   
        $validators = Validator::make($request->all(), [
            'id' => 'required',  
            'ayah' => 'required',
            'ibu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'sektor' => 'required',
            'masuk_tgl' => 'required',
            'pindah_tgl' => 'nullable',
            'pindah_dari' => 'nullable',
            'pindah_ke' => 'nullable'
        ]);

        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 

        $jemaat = Jemaat::find($id);
        $jemaat->id = $request->id;
        $jemaat->ayah = $request->ayah;
        $jemaat->ibu = $request->ibu;
        $jemaat->sektor = $request->sektor;
        $jemaat->pekerjaan_ayah = $request->pekerjaan_ayah;
        $jemaat->pekerjaan_ibu = $request->pekerjaan_ibu;
        $jemaat->masuk_tgl = $request->masuk_tgl;
        $jemaat->pindah_tgl = $request->pindah_tgl;
        $jemaat->pindah_dari = $request->pindah_dari;
        $jemaat->pindah_ke = $request->pindah_ke;
        $jemaat->updated_by = Auth::user()->id;        
        $jemaat->update();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keluarga')->with('success', 'Keluarga Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/keluarga')->with('success', 'Keluarga Berhasil Diedit');            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dana = Jemaat::find($id);        
        $dana->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keluarga')->with('sdelete', 'Keluarga Berhasil Dihapus');            
        }else{
            return redirect('sek/jemaat/keluarga')->with('sdelete', 'Keluarga Berhasil Dihapus');            
        }
    }
}
