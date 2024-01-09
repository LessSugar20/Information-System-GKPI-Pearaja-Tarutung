<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Ibadah;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Partangiangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JadwalsController extends Controller
{
   public function index(){
      // $endDate = Carbon::now()->endOfWeek();
      $i = Ibadah::latest()->get();
      // $p = Partangiangan::whereDate('tanggal', '<=', $endDate)->get();
      $x = 1;
      $p = Partangiangan::get();
      return view('pages.admin.jemaat.jadwal', compact('i', 'p', 'x'));
   }    

   public function store(Request $request){

   }

   public function edit($id){

   }

   public function update(Request $request){

   }

   public function destroy($id){
      
   }
}
