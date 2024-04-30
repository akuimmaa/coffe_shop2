<?php

namespace App\Http\Controllers;

use App\Models\Grafik;
use App\Models\Menu;
use App\Models\Stok;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Carbon\Carbon;

use App\Http\Requests\StoreGrafikRequest;
use App\Http\Requests\UpdateGrafikRequest;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GrafikController extends Controller

{
    public function index(){

        $data['menu_teratas'] = DetailTransaksi::with('menu')
        ->select('menu_id', DB::raw('COUNT(*) as total_terjual'))
        ->groupBy('menu_id')
        ->limit(5)->orderBy('total_terjual','desc')->get();

        $transaksi = Transaksi::get();
        $data['pendapatan'] = $transaksi->sum('total_harga');
        $today = Carbon::today();

        $pelanggan = Pelanggan::get();
        $data['count_pelanggan'] = $pelanggan->count();

        $transaksi = DetailTransaksi::get();
        $data['count_transaksi'] = $transaksi->count();

        $stok = Stok::get();
        $data['count_stok'] = $stok->count(); 

        

        $data['count_transaksi_today'] = DB::table('transaksis')->whereDate('tanggal', $today)->count();

        $data['data_penjualan']= 

        $data['menu'] = Menu::limit(5)->orderBy('created_at', 'desc')->get();
        
        $data['detail_transaksi'] = DetailTransaksi::limit(5)->orderBy('created_at', 'desc')->get(); 

        $data['stok'] = Stok::limit(5)->orderBy('jumlah', 'asc')->get(); 

        $data['transaksi'] = Transaksi::limit(5)->orderBy('created_at', 'desc', );

        

        return view('grafik.index')->with($data);
    }


    public function data_penjualan($lastCount)
    {
        $data = 0;
        if ($lastCount == 0) {
            $data = Transaksi::select(
                'tanggal',
                DB::raw('SUM(total_harga) as total_bayar'),
                DB::raw('COUNT(id) as jumlah')
            )
                ->groupBy('tanggal')
                ->orderBy('tanggal', 'asc')
                ->get();
        } else {
            $data = Transaksi::select(
                'tanggal',
                DB::raw('SUM(total_harga) as total_bayar'),
                DB::raw('COUNT(id) as jumlah')
            )
                ->groupBy('tanggal')
                ->orderBy('tanggal', 'asc')
                ->skip($lastCount - 1)
                ->limit(264187365)
                ->get();
        }
        return response($data);
    }

}
