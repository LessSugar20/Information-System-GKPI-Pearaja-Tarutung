<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bphj;
use App\Models\Account;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengurusController extends Controller
{
   public function index(){
      // $bphj = UserJemaat::with('bphj')->get();
      $i = 1;
      $bphj = Bphj::join('user_jemaat','user_jemaat.id', '=', 'bphj.id_jemaat')
                  ->select('user_jemaat.*', 'bphj.*')
                  ->get();
      return view('pages.admin.jemaat.pengurus', compact('bphj', 'i'));
     }
   public function create(){
      $jemaat = UserJemaat::get();
      $bphj = new Bphj;
      return view('pages.admin.jemaat.addPengurus', compact('jemaat', 'bphj'));
   }

   public function store(Request $request){
      $validators = Validator::make($request->all(), [            
         'id_jemaat' => 'required',
         'jabatan' => 'required',
         'periode' => 'required'
      ]);

      // dd($request);
      $b = new Bphj;
      $b->id_jemaat = $request->id_jemaat;  
      $b->jabatan = $request->jabatan;    
      $b->periode = $request->periode;
      $b->created_by = Auth::user()->id;
      $b->save();

      if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/pengurus')->with('success', 'Berhasil Ditambahkan');            
      }else{
            return redirect('sek/jemaat/pengurus')->with('success', 'Berhasil Ditambahkan');            
   }
   }

   public function edit($id){
      
   }

   public function update(Request $request){

   }

   public function destroy($id){
      $jemaat = Bphj::find($id);        
      $jemaat->delete();

      if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/pengurus')->with('sdelete', 'Berhasil Dihapus');            
      }else{
            return redirect('sek/jemaat/pengurus')->with('sdelete', 'Berhasil Dihapus');            
      }
   }
}
