<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Jenis;
use App\Exports\MenuExport;
use App\Imports\MenuImport; 
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Database\QueryException;
use PDOException; 
use Exception;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          try{
            $data['menu'] = Menu::get();
            $data['jenis'] = jenis::get();
            return view('menu.index')->with($data);
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
        $name = 'menu.xlsx';
        return Excel::download(new MenuExport, $name);
    }

    public function importData()
    {
        Excel::import(new MenuImport, request()->file('import'));

        return redirect(request()->segment(1).'/menu')->with('success', 'import data Menu Berhasil!');
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
    public function store(StoreMenuRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $data = $request->all();
        $data['image'] = $imageName;

        menu::create($data);

        return redirect('menu')->with('success', 'Data menu berhasil ditambah!');

        return back()->with('success', 'You have successfully upload an image.')-with('images', $imageName); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();            
            $request->image->move(public_path('image'), $imageName);
            $data = $request->all(); 
            $data['image'] = $imageName;
        } else {
            
        }

        $menu->update($data); 
        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::find($id)->delete();
        return redirect('menu')->with('success','Data Menu berhasil dihapus!');
    }
}
