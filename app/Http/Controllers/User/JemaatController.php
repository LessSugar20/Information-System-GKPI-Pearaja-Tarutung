<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Bphj;
use App\Models\Dana;
use App\Models\Sektor;
use App\Models\Account;
use App\Models\Penatua;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JemaatController extends Controller
{
    public function index_jemaat(){
      $all = UserJemaat::join('jemaat', 'jemaat.id', '=', 'user_jemaat.no_induk')->select('jemaat.*', 'user_jemaat.*')->orderBy('jemaat.created_at', 'DESC')->get();
      $i = 1;

      return view('pages.user.jemaat.jemaat', compact('all', 'i'));
    }

    public function index_pengurus(){
      $all = Bphj::join('user_jemaat','user_jemaat.id','=','bphj.id_jemaat')->select('bphj.*','user_jemaat.*')->get();
      $i = 1;
      $j = 1;
      // $pen = UserJemaat::with('penatua')->get();
      $pen = Penatua::Join('sektor', 'sektor.id', '=', 'penatua.id_sektor')
      ->join('user_jemaat', 'user_jemaat.id', '=', 'penatua.id_jemaat')
      ->select('penatua.*', 'user_jemaat.*', 'sektor.*')->get();

      return view('pages.user.jemaat.pengurus', compact('all', 'i', 'pen','j'));
    }

    public function index_distrik(){
      
      $all = Sektor::get();
      $i = 1;
      
      return view('pages.user.jemaat.distrik', compact('all', 'i'));           
    }

    public function index_keuangan(){
      $now = Carbon::now();
      $month = $now->month;
      
      $totalMasuk = Dana::selectRaw('MONTH(tanggal) as month, SUM(nominal) as total_masuk')
                    ->where('kategori', '=', 'masuk')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->value('total_masuk');

// Mengambil total keluar tiap bulan
      $totalKeluar = Dana::selectRaw('MONTH(tanggal) as month, SUM(nominal) as total_keluar')
                    ->where('kategori', '=', 'keluar')
                    ->groupBy('month')
                    ->orderBy('month')
                    ->value('total_keluar');
                    // Mengambil data masuk hanya untuk bulan ini
      $masuk = Dana::select('dana.*')
                  ->where('kategori', '=', 'masuk')
                  ->whereMonth('tanggal', $month)
                  ->orderBy('tanggal', 'desc')
                  ->get();
      
      // Mengambil data keluar hanya untuk bulan ini
      $keluar = Dana::select('dana.*')
                  ->where('kategori', '=', 'keluar')
                  ->whereMonth('tanggal', $month)
                  ->orderBy('tanggal', 'desc')
                  ->get();
      $total_kas = DB::table('dana')
                    ->select(DB::raw('SUM(CASE WHEN kategori = "masuk" THEN nominal ELSE -nominal END) AS total_kas'))
                    ->first()
                    ->total_kas;
      $i = 1;
      return view('pages.user.jemaat.keuangan', compact('masuk', 'keluar', 'i', 'total_kas', 'totalMasuk', 'totalKeluar'));      
    }
    
}
