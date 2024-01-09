<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ayat;
use App\Models\Alkitab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AyatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $ayat = Ayat::Join('alkitab', 'alkitab.id', '=', 'ayat.id_alkitab')
                ->select('alkitab.*', 'ayat.*')->get();
        $i = 1;
        return view('pages.admin.ayat.ayat', compact('ayat', 'i'));
   }
   
   public function create(){
        $kitab = Alkitab::get();
        return view('pages.admin.ayat.addAyat', ['kitab' => $kitab, 'data' => new Ayat]);
   }    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'id_alkitab' => 'required',  
            'tanggal' => 'required'         
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         }         
        
        $ayat = new Ayat;
        // $ayat->created_by = Auth::user()->id;
        $ayat->id_alkitab = $request->id_alkitab;
        $ayat->deskripsi = $request->deskripsi;
        $ayat->tanggal = $request->tanggal;
        $ayat->save();

        
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/ayat')->with('success', 'Ayat Berhasil Ditambahkan');
        }else{
            return redirect('sek/ayat')->with('success', 'Ayat Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Ayat::find($id);
        $kitab = Alkitab::get();

        return view('pages.admin.ayat.addAyat', compact('data', 'kitab'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validators = Validator::make($request->all(), [
            'id_alkitab' => 'required',  
            'tanggal' => 'required'         
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         }         
        
         $ayat = Ayat::find($id);
         // $ayat->created_by = Auth::user()->id;
        $ayat->id_alkitab = $request->id_alkitab;
        $ayat->deskripsi = $request->deskripsi;
        $ayat->tanggal = $request->tanggal;
        $ayat->update();

        
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/ayat')->with('success', 'Ayat Berhasil Diedit');
        }else{
            return redirect('sek/ayat')->with('success', 'Ayat Berhasil Diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ayat = Ayat::find($id);
        $ayat->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/ayat')->with('success', 'Ayat Berhasil Dihapus');
        }else{
            return redirect('sek/ayat')->with('success', 'Ayat Berhasil Dihapus');
        }
    }
}
