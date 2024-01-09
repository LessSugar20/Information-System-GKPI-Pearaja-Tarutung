<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dana;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KeuanganController extends Controller
{
     public function index(){
        $masuk = Dana::select('dana.*')->where('kategori', '=', 'masuk')->get();
        $keluar = Dana::select('dana.*')->where('kategori', '=', 'keluar')->get();
        $i = 1;
         return view('pages.admin.jemaat.keuangan', compact('masuk', 'keluar', 'i'));
     }

     public function create(){
        $dana = new Dana;
        return view('pages.admin.jemaat.addKeuangan', compact('dana'));
     }
     
     public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'keterangan' => 'required',  
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'nominal' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
        // dd($request);
        $dana = new Dana;
        $dana->keterangan = $request->keterangan;
        $dana->deskripsi = $request->deskripsi;
        $dana->tanggal = $request->tanggal;
        $dana->kategori = $request->kategori;
        $dana->nominal = $request->nominal;
        $dana->created_by = Auth::user()->id;
        $dana->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keuangan')->with('success', 'Keuangan Berhasil Ditambahkan');            
        }else{
            return redirect('sek/jemaat/keuangan')->with('success', 'Keuangan Berhasil Ditambahkan');            
        }
    }

    public function destroy($id){
        $dana = Dana::find($id);        
        $dana->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keuangan')->with('sdelete', 'Keuangan Berhasil Dihapus');            
        }else{
            return redirect('sek/jemaat/keuangan')->with('sdelete', 'Keuangan Berhasil Dihapus');            
        }
    }

    public function edit($id){
        $dana = Dana::find($id);
        return view('pages.admin.jemaat.addKeuangan', compact('dana'));
    }

    public function update(Request $request, $id){
        $validators = Validator::make($request->all(), [
            'keterangan' => 'required',  
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'kategori' => 'required',
            'nominal' => 'required'
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
        $dana = Dana::find($id);
        $dana->keterangan = $request->keterangan;
        $dana->deskripsi = $request->deskripsi;
        $dana->tanggal = $request->tanggal;
        $dana->kategori = $request->kategori;
        $dana->nominal = $request->nominal;
        $dana->updated_by = Auth::user()->id;
        $dana->update();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/keuangan')->with('success', 'Keuangan Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/keuangan')->with('success', 'Keuangan Berhasil Diedit');            
        }
    }
}
