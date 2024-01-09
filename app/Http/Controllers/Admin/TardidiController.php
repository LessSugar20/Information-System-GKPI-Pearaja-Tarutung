<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use App\Models\Account;
use App\Models\Tardidi;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bphj;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class TardidiController extends Controller
{
     public function index(){          
          $t = Tardidi::orderBy('id', 'DESC')->get();
          return view('pages.admin.pendaftaran.tardidi', compact('t'));
     }

     public function store(Request $request){
          $validators = Validator::make($request->all(), [
               'nama' => 'required',  
               'id_sektor' => 'required',  
               'tempat_lahir' => 'required',  
               'tanggal_lahir' => 'required',  
               'ayah' => 'required',  
               'ibu' => 'required'         
           ]);
           if ($validators->fails()) {
               return redirect()->back()->withErrors($validators)->withInput();
            } 
           
           $t = new Tardidi();
           $t->nama = $request->nama;
           $t->id_sektor = $request->id_sektor;
           $t->tempat_lahir = $request->tempat_lahir;
           $t->tanggal_lahir = $request->tanggal_lahir;
           $t->ayah = $request->ayah;
           $t->ibu = $request->ibu;
           $t->save();
              
          return back()->with('success', 'Pendaftaran Berhasil!');
           
     }

     public function create(){
          $sektor = Sektor::get();
          // $jemaat = UserJemaat::select('user_jemaat.*')
          //                     ->where('baptis', '=', NULL)
          //                     ->orderBy('nama', 'asc')
          //                     ->get();
          $data = new Tardidi;          
          return view('pages.user.pendaftaran.tardidi',  compact('sektor','data'));
     }
  
     public function edit($id){
          $sektor = Sektor::get();
          $t = Tardidi::find($id);          
          $gj = UserJemaat::with('bphj')
                         ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                         ->where('bphj.jabatan', '=', 'guru_jemaat')->get();
          $p = UserJemaat::with('bphj')
                         ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                         ->where('bphj.jabatan', '=', 'pendeta')->get();
          
          return view('pages.admin.pendaftaran.editTardidi', compact('t', 'gj', 'p','sektor'));
     }
  
     public function update(Request $request, $id){  
          $validators = Validator::make($request->all(), [
               'nama' => 'required',  
               'id_sektor' => 'required',  
               'ayah' => 'required',  
               'ibu' => 'required',
               'no_surat' => 'required|unique:tardidi',  
               'pendeta' => 'required',  
               'guru_jemaat' => 'required',  
               'tanggal_baptis' => 'required',  
          ]);
          if ($validators->fails()) {
          return redirect()->back()->withErrors($validators)->withInput();
          }          
          $t = Tardidi::find($id);
          $t->nama = $request->nama;
          $t->id_sektor = $request->id_sektor;          
          $t->ayah = $request->ayah;
          $t->ibu = $request->ibu;
          $t->no_surat = $request->no_surat;
          $t->pendeta = $request->pendeta;
          $t->guru_jemaat = $request->guru_jemaat;
          $t->tanggal_baptis = $request->tanggal_baptis;
          $t->updated_by = Auth::user()->id;   
          $t->update();

          if (Auth::user()->hasRole('admin')) {
               return redirect('admin/pendaftaran/tardidi')->with('success', 'Berhasil Diedit');            
          }else{
               return redirect('sek/pendaftaran/tardidi')->with('success', 'Berhasil Diedit');            
          }
     }
  
     public function destroy($id){
          $t = Tardidi::find($id);        
          $t->delete();
    
          if (Auth::user()->hasRole('admin')) {
                return redirect('admin/pendaftaran/tardidi')->with('sdelete', 'Berhasil Dihapus');            
          }else{
                return redirect('sek/pendaftaran/tardidi')->with('sdelete', 'Berhasil Dihapus');            
          }
     }
     
}
