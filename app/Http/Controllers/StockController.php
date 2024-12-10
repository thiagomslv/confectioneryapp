<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateAmountProductRequest;

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

        $stock = $branch->stock()->orderBy('id')->get();

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
    public function update(UpdateAmountProductRequest $request, string $id)
    {
        $qnt = (int) request('qnt');

        $product = Product::find($id);

        $res = $product->amount + $qnt;
        if($res >= 0){

            $product->amount = $res;
            $product->save();
        }else{

            return back()->with('message', 'Não é possível reduzir a quantidade quando o valor for zero!');
        } 

        return back()->with('message', 'Quantidade atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if(is_null($product)){

            return back()->with('message', 'Produto não encontrado!');
        }

        $product->delete();

        return back()->with('message', 'Produto removido do estoque!');
    }
}
