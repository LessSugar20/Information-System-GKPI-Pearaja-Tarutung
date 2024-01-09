<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengumuman;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;

class PengumumanController extends Controller
{
     public function index(){
        $p = Pengumuman::get();
        $i = 1;
        return view('pages.admin.jemaat.pengumuman', compact('p', 'i'));
     }
     public function create(){
      $p = new Pengumuman;
      return view('pages.admin.jemaat.addPengumuman', compact('p'));
  }

  public function store(Request $request){
      $validators = Validator::make($request->all(), [
         'judul' => 'required', 
         'isi' => 'required',  
         'tanggal' => 'required'         
         ]);
         if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
    
        $p = new Pengumuman;
        $p->judul = $request->judul;
        $p->isi = $request->isi;
        $p->tanggal = $request->tanggal;
        $p->created_by = Auth::user()->id;
        $p->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/pengumuman')->with('success', 'Pengumuman Berhasil Ditambahkan');
        }else{
            return redirect('sek/jemaat/pengumuman')->with('success', 'Pengumuman Berhasil Ditambahkan');
        }           
  }
         

  public function edit($id){
      $p = Pengumuman::find($id);
      return view('pages.admin.jemaat.addPengumuman', compact('p'));
  }

  public function update(Request $request, $id){
    $validators = Validator::make($request->all(), [
        'judul' => 'required', 
        'isi' => 'required',  
        'tanggal' => 'required'         
        ]);
    if ($validators->fails()) {
        return redirect()->back()->withErrors($validators)->withInput();
    } 

      $p = Pengumuman::find($id);
      $p->judul = $request->judul;
      $p->isi = $request->isi;
      $p->tanggal = $request->tanggal;
      $p->updated_by = Auth::user()->id;   
      $p->update();

     if (Auth::user()->hasRole('admin')) {
         return redirect('admin/jemaat/pengumuman')->with('success', 'Pengumuman Berhasil Diedit');            
     }else{
         return redirect('sek/jemaat/pengumuman')->with('success', 'Pengumuman Berhasil Diedit');            
     }
  }

  public function destroy($id){
      $pengumuman = Pengumuman::find($id);        
      $pengumuman->delete();

      if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/pengumuman')->with('sdelete', 'Pengumuman Berhasil Dihapus');            
      }else{
            return redirect('sek/jemaat/pengumuman')->with('sdelete', 'Pengumuman Berhasil Dihapus');            
      }
  }
}
