<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Models\Dana;
use App\Models\User;
use App\Models\Jemaat;
use App\Models\Malua;
use App\Models\Tardidi;
use App\Models\Menikah;
use App\Models\UserJemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Penatua;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ConsoleTVs\Charts\Facades\Charts;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index(){
        return view('pages.admin.login');
    }

    public function login_action(Request $request){
        $credentials = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);
        
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            if(Auth::user()->hasRole('admin')){

                return redirect()->intended('admin/')->with('success','Anda berhasil login!');    
            }
            else{
                return redirect()->intended('sek/')->with('success','Anda berhasil login!');    
            }

        }
        $acc = User::where('username', '=',$request->username)->first();
        $pass = User::all();
        $status = 0;
        foreach($pass as $p){
            if (Hash::check($request->password, $p->password, [])){
                $status = 1;
                break;
            }
        }
        if(!$acc && !$status){
            return back()->with('loginError', 'Username dan Password anda salah!');
        }
        else if(!$acc && $status){
                return back()->with('loginError', 'Username anda salah!');
        }
        else {
                return back()->with('loginError', 'Password anda salah!');            
        }
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function home(){
        $jemaat = UserJemaat::count();
        $jemaat_aktif = UserJemaat::where('status', '=', 'aktif')->count();
        $kel = Jemaat::where('pindah_ke', '=', Null)->count();
        $k = Jemaat::count();
        $penatua = Penatua::count();
        $p = Penatua::where('status', '=', 'aktif')->count();
        $total_kas = DB::table('dana')
                    ->select(DB::raw('SUM(CASE WHEN kategori = "masuk" THEN nominal ELSE -nominal END) AS total_kas'))
                    ->first()
                    ->total_kas;
        if($penatua){
            $persen2 = ($p / $penatua) * 100;  

        }
        // dd($nikah);
        if($jemaat){
            $persen = ($jemaat_aktif / $jemaat) * 100;  

        }
        if($k){
            $persen1 = ($kel / $k) * 100;  

        }
       
        // DB::statement("SET @@date_first = 1");
        $data = Dana::select(\DB::raw('YEARWEEK(tanggal, 1) as week'), \DB::raw('SUM(CASE WHEN kategori = "masuk" THEN nominal ELSE 0 END) as total_pemasukan'), \DB::raw('SUM(CASE WHEN kategori = "keluar" THEN nominal ELSE 0 END) as total_pengeluaran'))
                ->groupBy('week')
                ->orderBy('week')
                ->get();

        $chartData = [];
        $labels = [];
        $pemasukan = [];
        $pengeluaran = [];
        
        foreach ($data as $item) {
            $week = $item->week;
            $year = substr($week, 0, 4);
            $weekNumber = substr($week, 4);
            
            // Mendapatkan tanggal awal dan akhir minggu
            $date = new DateTime();
            $date->setISODate($year, $weekNumber);
            $startOfWeek = $date->format('d M');
            $date->modify('+6 days');
            $endOfWeek = $date->format('d M');
            
            $labels[] = "$startOfWeek - $endOfWeek ($year)";
            $pemasukan[] = $item->total_pemasukan;
            $pengeluaran[] = $item->total_pengeluaran;
        }
        
        $chartData['labels'] = $labels;
        $chartData['pemasukan'] = $pemasukan;
        $chartData['pengeluaran'] = $pengeluaran;
        
        $totalPemasukan = array_sum($pemasukan);
        $totalPengeluaran = array_sum($pengeluaran);

        // Menyimpan total pemasukan dan pengeluaran ke dalam array chartData
        $chartData['total_pemasukan'] = $totalPemasukan;
        $chartData['total_pengeluaran'] = $totalPengeluaran;

        $maluaData = DB::table('malua')
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) AS total'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $menikahData = DB::table('menikah')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) AS total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $tardidiData = DB::table('tardidi')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") AS month'), DB::raw('COUNT(*) AS total'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Menggabungkan data dari ketiga tabel menjadi satu array
        $combinedData = [];
        foreach ($maluaData as $data) {
            $month = $data->month;
            $combinedData[$month]['malua'] = $data->total;
        }

        foreach ($menikahData as $data) {
            $month = $data->month;
            $combinedData[$month]['menikah'] = $data->total;
        }

        foreach ($tardidiData as $data) {
            $month = $data->month;
            $combinedData[$month]['tardidi'] = $data->total;
        }

        // Menginisialisasi array untuk label bulan dan jumlah data
        $months = [];
        $maluaCount = [];
        $menikahCount = [];
        $tardidiCount = [];

        // Mengisi array dengan data dari $combinedData
        foreach ($combinedData as $month => $data) {
            $timestamp = strtotime($month);
            $monthYear = date('F Y', $timestamp);
            $months[] = $monthYear;
            $maluaCount[] = isset($data['malua']) ? $data['malua'] : 0;
            $menikahCount[] = isset($data['menikah']) ? $data['menikah'] : 0;
            $tardidiCount[] = isset($data['tardidi']) ? $data['tardidi'] : 0;
        }

            // return view('chart', compact('chartData'));                

        return view('pages.admin.home', compact('months', 'maluaCount', 'menikahCount','total_kas', 'tardidiCount','chartData',  'jemaat', 'persen', 'jemaat_aktif', 'kel', 'persen1', 'k', 'p', 'penatua', 'persen2'));

        
    }
}
