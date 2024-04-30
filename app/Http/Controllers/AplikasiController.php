<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Http\Requests\StoreAplikasiRequest;
use App\Http\Requests\UpdateAplikasiRequest;
use Illuminate\Database\QueryException;
use PDOException; 
use Exception;
use App\Exports\AplikasiExport;
use App\Imports\AplikasiImport;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['aplikasi'] = Aplikasi::get();
            return view('Aplikasi.index')->with($data);
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
        $name = 'aplikasi.xlsx';
        return Excel::download(new AplikasiExport, $name);
    }

    public function importData(Request $request){

        Excel::import(new AplikasiImport, $request->import);
        return redirect('aplikasi')->with('success', 'Import data paket berhasil!');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Aplikasi::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('aplikasi/aplikasi-pdf', ['aplikasi'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-aplikasi.pdf');
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
     * @param  \App\Http\Requests\StoreAplikasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAplikasiRequest $request )
    {
        $data = $request->all();
        Aplikasi::create($data);
        return redirect('aplikasi')->with('success', 'Data aplikasi berhasil ditambah!');
        return back()->with('success', 'You have successfully upload.'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAplikasiRequest  $request
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAplikasiRequest $request, string $id)
    {
        $aplikasi = Aplikasi::find($id);
       
        return redirect('aplikasi')->with('success', 'Update data berhasil');

    }

    public function updateStok(UpdateAplikasiRequest $request, $id)
    {
        try {
            $aplikasi = Aplikasi::findOrFail($id);
            $aplikasi->stok = $request->input('stok');
            $aplikasi->save();
            return response()->json(['message' => 'Stok berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui stok: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aplikasi::find($id)->delete();
        return redirect('aplikasi')->with('success','Data Aplikasi berhasil dihapus!');
    }

}
