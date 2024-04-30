<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use Barryvdh\DomPDF\Facade\Pdf;
use PDOException;
use Exception;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $data['absensi'] = Absensi::get();
            return view('absensi.index', $data);
                
        } catch (PDOException | Exception $error) {
            return $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


       /**
     * Export import data to Excel and PDF.
     */
    public function exportData()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date.'Absensi.xlsx');
    }

    public function importData(Request $request){
        
        Excel::import(new AbsensiImport, $request->import);
        return redirect('absensi')->back()->with('success', 'Import data berhasil!');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Absensi::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('Absensi/absensi-pdf', ['absensi'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-absensi.pdf');
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
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbsensiRequest $request)
    {
        Absensi::create($request->all());
        return redirect('absensi')->with('success', 'Data absensi berhasil ditambahkan!');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbsensiRequest $request, string $id)
    {
        Absensi::find($id)->update($request->all());

        return redirect('absensi')->with('success', 'Data Absensi berhasil diperbarui');
  
    }

   /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Absensi::find($id)->delete();

        return redirect('absensi')->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Handle the fail response.
     */
    private function failResponse($errorMessage, $errorCode)
    {
        return redirect()->back()->with('error', 'Error [' . $errorCode . ']: ' . $errorMessage);
    }
}
