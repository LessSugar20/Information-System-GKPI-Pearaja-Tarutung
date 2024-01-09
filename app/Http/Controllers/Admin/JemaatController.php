<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jemaat;
use App\Models\Account;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class JemaatController extends Controller
{
   public function index(){
      $jem = UserJemaat::Join('jemaat', 'jemaat.id', '=', 'user_jemaat.no_induk')
                ->select('jemaat.*', 'user_jemaat.*')->orderBy('jemaat.created_at', 'DESC')->get();
      $i = 1;                
      return view('pages.admin.jemaat.jemaat', compact('jem', 'i'));
   }

  
   public function create(){
      $kel = Jemaat::get();
      $jem = new UserJemaat;
      return view('pages.admin.jemaat.addJemaat', compact('kel', 'jem'));
   }   

   public function store(Request $request){
         $validators = Validator::make($request->all(), [            
            'no_induk' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'baptis' => 'required',
            'sidi' => 'nullable',
            'nikah' => 'nullable',
            'pindah_tgl' => 'nullable',
            'meninggal' => 'nullable'
      ]);

      if ($validators->fails()) {
         return redirect()->back()->withErrors($validators)->withInput();
      } 

      // dd($request);
      $jemaat = new UserJemaat;
      $jemaat->no_induk = $request->no_induk;  
      $jemaat->nama = $request->nama;    
      $jemaat->tempat_lahir = $request->tempat_lahir;
      $jemaat->tgl_lahir = $request->tgl_lahir;
      $jemaat->baptis = $request->baptis;
      $jemaat->sidi = $request->sidi;
      $jemaat->nikah = $request->nikah;
      $jemaat->pindah_tgl = $request->pindah_tgl;
      $jemaat->meninggal = $request->meninggal;
      $jemaat->created_by = Auth::user()->id;
      $jemaat->save();

      if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jemaat')->with('success', 'Jemaat Berhasil Ditambahkan');            
      }else{
            return redirect('sek/jemaat/jemaat')->with('success', 'Jemaat Berhasil Ditambahkan');            
      }
   }

   public function edit($id){
      $jem = UserJemaat::find($id);
      // dd($jem);
      $kel = Jemaat::get();
      return view('pages.admin.jemaat.addjemaat', compact('jem', 'kel'));
   }

   public function update(Request $request, $id){      
      $validators = Validator::make($request->all(), [            
         'no_induk' => 'required',
         'nama' => 'required',
         'tempat_lahir' => 'required',
         'tgl_lahir' => 'required',
         'baptis' => 'required',
         'sidi' => 'nullable',
         'nikah' => 'nullable',
         'pindah_tgl' => 'nullable',
         'meninggal' => 'nullable'
   ]);

   if ($validators->fails()) {
      return redirect()->back()->withErrors($validators)->withInput();
   } 
      $jemaat = UserJemaat::find($id);      
      $jemaat->no_induk = $request->no_induk;
      $jemaat->nama = $request->nama;
      $jemaat->status = $request->status;
      $jemaat->tempat_lahir = $request->tempat_lahir;
      $jemaat->tgl_lahir = $request->tgl_lahir;
      $jemaat->baptis = $request->baptis;
      $jemaat->sidi = $request->sidi;
      $jemaat->nikah = $request->nikah;
      $jemaat->pindah_tgl = $request->pindah_tgl;
      $jemaat->meninggal = $request->meninggal;
      $jemaat->updated_by = Auth::user()->id;   
      $jemaat->update();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jemaat')->with('success', 'Jemaat Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/jemaat')->with('success', 'Jemaat Berhasil Diedit');            
        }
   }

   public function destroy($id){
      $jemaat = UserJemaat::find($id);        
      $jemaat->delete();

      if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/jemaat')->with('sdelete', 'Jemaat Berhasil Dihapus');            
      }else{
            return redirect('sek/jemaat/jemaat')->with('sdelete', 'Jemaat Berhasil Dihapus');            
      }
   }
}
