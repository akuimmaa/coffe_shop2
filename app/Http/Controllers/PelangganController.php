<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use PDOException;
use Exception;
use Illuminate\Http\Request;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['pelanggan'] = Pelanggan::get();
            return view('pelanggan.index')->with($data);
        }
            catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


    /**
     * Export data to Excel.
     */
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new PelangganExport, $date.'pelanggan.xlsx');
    }

    public function importData(Request $request){

        Excel::import(new PelangganImport, $request->import);
        return redirect('pelanggan')->with('success', 'Import data berhasil!');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Pelanggan::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('pelanggan/pelanggan-pdf', ['pelanggan'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-pelangan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        Pelanggan::create($request->all());

        return redirect('pelanggan')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, string $id)
    {
        $pelanggan = Pelanggan::find($id)->update($request->all());
        return redirect('pelanggan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return redirect('pelanggan')->with('success','Data pelanggan berhasil dihapus!');
    }
}
