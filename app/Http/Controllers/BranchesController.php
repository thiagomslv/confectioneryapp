<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\CreateBranchRequest;

use App\Models\Branch;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::orderBy('id', 'asc')->get();

        return Inertia::render('Branches/ListBranches', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Branches/CreateBranch');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBranchRequest $request)
    {

        $parsedLagLong = request('long')." ".request('lat');

        Branch::create([

            'name' => request('name'),
            'address' => request('address'),
            'phone' => request('phone'),
            'location' => 'POINT('.$parsedLagLong.')'
        ]);

        return back()->with('message', 'Filial criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::find($id);

        if(is_null($branch)){

            return redirect()->route('branches.index')->with('message', 'Filial não encontrada!');
        }

        return Inertia::render('Branches/EditBranch', ['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateBranchRequest $request, string $id)
    {
        $branch = Branch::find($id);

        if(is_null($branch)){

            return redirect()->route('branches.index')->with('message', 'Filial não encontrada!');
        }

        $parsedLagLong = request('long')." ".request('lat');

        $branch->update([

            'name' => request('name'),
            'address' => request('address'),
            'phone' => request('phone'),
            'location' => 'POINT('.$parsedLagLong.')'
        ]);

        return redirect()->route('branches.index')->with('message', 'Filial atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::find($id);

        if(is_null($branch)){

            return back()->with('message', 'Filial não encontrada!');
        }

        $branch->delete();

        return back()->with('message', 'A filial foi removida!');
    }

    public function branchesMap(){

        $branches = Branch::all();

        return Inertia::render('Branches/MapBranches', ['branches' => $branches]);
    }
}
