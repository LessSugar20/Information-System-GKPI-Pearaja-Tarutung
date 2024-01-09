<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use App\Models\Penatua;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class DistrikController extends Controller
{
     public function index(){
        // $all = Penatua::Join('sektor', 'sektor.id', '=', 'penatua.id_sektor')
        //             ->select('sektor.*', 'penatua.*')
        //             ->get();

        $all = Sektor::get();
        $i = 1;
        // dd($all);
         return view('pages.admin.jemaat.distrik', compact('all', 'i'));
     }

     public function create(){
        $sek = new Sektor;
        $penatua = UserJemaat::with('penatua')->get();
         return view('pages.admin.jemaat.addDistrik', compact('sek', 'penatua'));
     }
     
     public function store(Request $request){
        $validators = Validator::make($request->all(), [
            'nama' => 'required|min:5',  
            'lokasi' => 'required',         
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
        
        $sek = new Sektor;
        $sek->nama = $request->nama;
        $sek->lokasi = $request->lokasi;
        $sek->created_by = Auth::user()->id;
        $sek->save();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/distrik')->with('success', 'Sektor Berhasil Ditambahkan');
        }else{
            return redirect('sek/jemaat/distrik')->with('success', 'Sektor Berhasil Ditambahkan');
        }   
     }

     public function update(Request $request, $id){
        $validators = Validator::make($request->all(), [
            'nama' => 'required',  
            'lokasi' => 'required',
            'penatua' => 'required'         
        ]);
        if ($validators->fails()) {
            return redirect()->back()->withErrors($validators)->withInput();
         } 
         
        $sektor = Sektor::find($id);
        $sektor->nama = $request->nama;        
        $sektor->lokasi = $request->lokasi;
        $sektor->penatua = $request->penatua;
        $sektor->updated_by = Auth::user()->id;  
        $sektor->update();

        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/distrik')->with('success', 'Sektor Berhasil Diedit');            
        }else{
            return redirect('sek/jemaat/distrik')->with('success', 'Sektor Berhasil Diedit');            
        }
     }

     
    public function edit($id){
        $sek = Sektor::find($id);
        // dd($jem);
        $penatua = UserJemaat::with('penatua')->get();
        return view('pages.admin.jemaat.addDistrik', compact('sek', 'penatua'));
    }

     public function destroy($id){
        $sektor = Sektor::find($id);
        $sektor->delete();
 
        if (Auth::user()->hasRole('admin')) {
            return redirect('admin/jemaat/distrik')->with('success', 'Sektor Berhasil Dihapus');
        }else{
            return redirect('sek/jemaat/distrik')->with('success', 'Sektor Berhasil Dihapus');
        }
     }
}
