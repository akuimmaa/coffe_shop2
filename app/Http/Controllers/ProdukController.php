<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Category;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Database\QueryException;
use PDOException; 
use Exception;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            try{
                $data['produk'] = Produk::get();
                $data['category'] = Category::get();
                return view('produk.index')->with($data);
            }
            catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
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
    public function store(StoreProdukRequest $request)
    {
        Produk::create($request->all());

        return redirect('produk')->with('success', 'Data produk berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
         $produk->update($request->all());
         return redirect('produk')->with('success', 'Update data berhasil');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect('produk')->with('success','Data produk berhasil dihapus!');
    }
}
