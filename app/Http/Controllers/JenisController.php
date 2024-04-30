<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Exports\JenisExport;
use App\Imports\JenisImport;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use PDOException;
use Exception;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;



class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            
            $data['jenis'] = Jenis::get();
            return view('jenis.index', $data);
                
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
        return Excel::download(new JenisExport, $date.'jenis.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new JenisImport, $request->import);
        return redirect('jenis')->with('success', 'Import data paket berhasil!');
    }

    public function generatePDF()
    {
        // Data untuk ditampilkan dalam PDF
        $data = Jenis::all(); 
          
        // Render view ke HTML
        $pdf = PDF::loadView('jenis/jenis-pdf', ['jenis'=>$data]); 
        $date = date('Y-m-d');
        return $pdf->download($date.'-data-jenis.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: Implement create method logic
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());

        return redirect('jenis')->with('success', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        // TODO: Implement show method logic
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        // TODO: Implement edit method logic
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, string $id)
    {
        Jenis::find($id)->update($request->all());

        return redirect('jenis')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jenis::find($id)->delete();

        return redirect('jenis')->with('success', 'Data jenis berhasil dihapus!');
    }

    /**
     * Handle the fail response.
     */
    private function failResponse($errorMessage, $errorCode)
    {
        return redirect()->back()->with('error', 'Error [' . $errorCode . ']: ' . $errorMessage);
    }
}