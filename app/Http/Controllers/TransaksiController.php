<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailTransaksi;
use Error;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreTransaksiRequest $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Menghitung nomor transaksi baru
            $last_id = Transaksi::whereDate('tanggal', today())->orderBy('id', 'desc')->first();
            $last_id_number = $last_id ? substr($last_id->id, 8) : 0;
            $notrans = today()->format('Ymd') . str_pad($last_id_number + 1, 4, '0', STR_PAD_LEFT);

            $insertTransaksi = Transaksi::create([
                'id' => $notrans, 
                'tanggal' => date('y-m-d'), 
                'total_harga' => $request->total, 
                'metode_pembayaran' => 'cash', 
                'keterangan' => ''
            ]);
            if (!$insertTransaksi->exists) return 'error'; 

            //input detail transaksi 
            foreach ($request->orderedList as $detail) {
                $insertDetailTransaksi = DetailTransaksi::create([
                    'transaksi_id' => $notrans, 
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }


            // Membuat transaksi baru
            DB::commit();

            return response()->json(['status' => true, 'message' => 'Pemesanan Berhasil!', 'notrans' => $notrans]);
        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e]);
        }
    }

    public function faktur($nofaktur){
        try{
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query){
                $query->with('menu');
            }])->first();

            if($data['transaksi']==null){
                throw new Error();
            }

            return view('pemesanan.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'Pemesanan Gagal']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
       //
    }
}