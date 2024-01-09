<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Alkitab;
use App\Models\Menikah;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenikahController extends Controller
{
    
     public function index(){
          $menikah = Menikah::orderBy('id', 'DESC')->get();
          return view('pages.admin.pendaftaran.menikah', compact('menikah'));
     }
     
     public function create(){
          return view('pages.user.pendaftaran.menikah');
     }

     public function store(Request $request){
          $validators = Validator::make($request->all(), [         
               'pria' => 'required',  
               'wanita' => 'required',  
               'wali_pria' => 'required',  
               'wali_wanita' => 'required',  
               'tanggal' => 'required',  
               'lokasi' => 'required',           
           ]);
           if ($validators->fails()) {
              return redirect()->back()->withErrors($validators)->withInput();
           } 
            $m = new Menikah;      
            $m->pria = $request->pria;
            $m->wanita = $request->wanita;
            $m->wali_pria = $request->wali_pria;
            $m->wali_wanita = $request->wali_wanita;
            $m->tanggal = $request->tanggal;
            $m->lokasi = $request->lokasi;
            $m->save();
               
            return back()->with('success', 'Pendaftaran Berhasil!');
     }               
  
     public function edit($id){
          $m = Menikah::find($id);          
          $kitab = Alkitab::get();
          $gj = UserJemaat::with('bphj')
                         ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                         ->where('bphj.jabatan', '=', 'guru_jemaat')->get();
          $p = UserJemaat::with('bphj')
                         ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                         ->where('bphj.jabatan', '=', 'pendeta')->get();
          return view('pages.admin.pendaftaran.editMenikah', compact('m', 'kitab', 'gj', 'p'));


     }
  
     public function update(Request $request, $id){
          $validators = Validator::make($request->all(), [        
               'no_surat' => 'required|unique:menikah', 
               'pria' => 'required',  
               'wanita' => 'required', 
               'tanggal' => 'required',  
               'nats' => 'required',
               'pendeta' => 'required',  
               'guru_jemaat' => 'required',
               'lokasi' => 'required',           
           ]);
           if ($validators->fails()) {               
              return redirect()->back()->withErrors($validators)->withInput();
           } 
            $m = Menikah::find($id);
            $m->no_surat = $request->no_surat;
            $m->pria = $request->pria;
            $m->wanita = $request->wanita;
            $m->tanggal = $request->tanggal;
            $m->lokasi = $request->lokasi;       
            $m->pendeta = $request->pendeta;
            $m->guru_jemaat = $request->guru_jemaat;       
            $m->nats = $request->nats;     
            $m->updated_by = Auth::user()->id;   
            $m->update();
   
            if (Auth::user()->hasRole('admin')) {
               return redirect('admin/pendaftaran/menikah')->with('success', 'Berhasil Diedit');            
            }else{
               return redirect('sek/pendaftaran/menikah')->with('success', 'Berhasil Diedit');            
            }
     }
  
     public function destroy($id){
          $m = Menikah::find($id);        
          $m->delete();
    
          if (Auth::user()->hasRole('admin')) {
                return redirect('admin/pendaftaran/menikah')->with('sdelete', 'Berhasil Dihapus');            
          }else{
                return redirect('sek/pendaftaran/menikah')->with('sdelete', 'Berhasil Dihapus');            
          }
     }
     
}
