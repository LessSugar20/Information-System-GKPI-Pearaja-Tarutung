<?php

namespace App\Http\Controllers\Admin;

use App\Models\Malua;
use App\Models\Account;
use App\Models\Alkitab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserJemaat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaluaController extends Controller
{
     public function index(){
      $malua = Malua::join('user_jemaat', 'user_jemaat.id', '=', 'malua.id_user_jemaat')
                     ->select('user_jemaat.*','malua.*')
                     ->get();
        return view('pages.admin.pendaftaran.malua', compact('malua'));
     }

     public function create(){
         $jemaat = UserJemaat::select('user_jemaat.*')
                              ->where('baptis', '!=', NULL)
                              ->where('sidi', '=', NULL)
                              ->orderBy('nama', 'asc')
                              ->get();                            
         $data  = new Malua;
         return view('pages.user.pendaftaran.malua', compact('jemaat', 'data'));
     }
     
     public function store(Request $request){
      $validators = Validator::make($request->all(), [         
         'id_user_jemaat' => 'required',  
         'tempat_lahir' => 'required',  
         'tanggal_lahir' => 'required',  
         'tanggal_baptis' => 'required',           
     ]);
     if ($validators->fails()) {
        return redirect()->back()->withErrors($validators)->withInput();
     } 
      $m = new Malua;      
      $m->id_user_jemaat = $request->id_user_jemaat;
      $m->tempat_lahir = $request->tempat_lahir;
      $m->tanggal_lahir = $request->tanggal_lahir;
      $m->tanggal_baptis = $request->tanggal_baptis;
      $m->save();
         
      return back()->with('success', 'Pendaftaran Berhasil!');
     }
  
     public function edit($id){
      $m = Malua::find($id);          
      $jemaat = UserJemaat::select('user_jemaat.*')
                           ->where('baptis', '!=', NULL)
                           ->where('sidi', '=', NULL)
                           ->orderBy('nama', 'asc')
                           ->get();     
      $kitab = Alkitab::get();
      $gj = UserJemaat::with('bphj')
                     ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                     ->where('bphj.jabatan', '=', 'guru_jemaat')->get();
      $p = UserJemaat::with('bphj')
                     ->join('bphj', 'user_jemaat.id', '=', 'bphj.id_jemaat')
                     ->where('bphj.jabatan', '=', 'pendeta')->get();
      
      return view('pages.admin.pendaftaran.editMalua', compact('m', 'gj', 'p','kitab','jemaat'));
     }
  
     public function update(Request $request, $id){
        $validators = Validator::make($request->all(), [         
            'id_user_jemaat' => 'required', 
            'nats' => 'required',  
            'no_surat' => 'required|unique:malua',  
            'pendeta' => 'required',   
            'guru_jemaat' => 'required',  
            'tanggal_baptis' => 'required',           
            'tanggal_sidi' => 'required',  
        ]);
        if ($validators->fails()) {
           return redirect()->back()->withErrors($validators)->withInput();
        } 
         $m = Malua::find($id);
         $m->id_user_jemaat = $request->id_user_jemaat;
         $m->nats = $request->nats;                   
         $m->no_surat = $request->no_surat;
         $m->pendeta = $request->pendeta;
         $m->guru_jemaat = $request->guru_jemaat;
         $m->tanggal_baptis = $request->tanggal_baptis;
         $m->tanggal_sidi = $request->tanggal_sidi;
         $m->updated_by = Auth::user()->id;   
         $m->update();

         if (Auth::user()->hasRole('admin')) {
            return redirect('admin/pendaftaran/malua')->with('success', 'Berhasil Diedit');            
         }else{
            return redirect('sek/pendaftaran/malua')->with('success', 'Berhasil Diedit');            
         }
     }
  
     public function destroy($id){
         $m = Malua::find($id);        
         $m->delete();

         if (Auth::user()->hasRole('admin')) {
               return redirect('admin/pendaftaran/malua')->with('sdelete', 'Berhasil Dihapus');            
         }else{
               return redirect('sek/pendaftaran/malua')->with('sdelete', 'Berhasil Dihapus');            
         }
     }
}
