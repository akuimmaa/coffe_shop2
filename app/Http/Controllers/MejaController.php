<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use App\Exports\MejaExport;
use App\Imports\MejaImport; 
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDOException; 
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data['meja'] = Meja::get();
            return view('meja.index')->with($data);
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
        return Excel::download(new MejaExport, $date.'meja.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MejaImport, $request->import);
        return redirect('meja')->with('success', 'Import data paket berhasil!');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Meja::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('meja/meja-pdf', ['meja'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-meja.pdf');
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
     * @param  \App\Http\Requests\StoreMejaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMejaRequest $request)
    {
        Meja::create($request->all());

        return redirect('meja')->with('success', 'Data Meja berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMejaRequest  $request
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMejaRequest $request, string $id)
    {
        $meja = Meja::find($id)->update($request->all());
        return redirect('meja')->with('success', 'Update data berhasil');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meja  $meja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meja::find($id)->delete();
        return redirect('meja')->with('success','Data Meja berhasil dihapus!');
    }
}
