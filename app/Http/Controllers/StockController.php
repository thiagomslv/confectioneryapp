<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\StoreProductRequest;

use App\Models\Branch;
use App\Models\Product;

//$branches[0]->stock()->get();

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $branches = Branch::select('id', 'name')->get();

        return Inertia::render('Branches/StockManager', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        Product::create([

            'name' => request('name'),
            'amount' => request('amount'),
            'branch_id' => request('branch_id')

        ]);
        return redirect()->route('branches.stock.show', ['id' => request('branch_id')])->with('message', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $branch = Branch::find($id);
        if(is_null($branch)){
        
            //Retornar mensagem de erro.
            return redirect()->route('branches.stock')->with('message', 'Filial não encontrada!');
        }

        $stock = $branch->stock()->get();

        return Inertia::render('Branches/ListStock', ['stock' => $stock, 'branch_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
