<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierController extends Controller
{
    private  $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        //$this->middleware('auth');
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        $suppliers = $this->supplierRepository->all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request)
    {
        $this->supplierRepository->create($request ->all());
        session()->flash('success', 'Fournisseur ajouté avec succès !');
        return redirect('suppliers');
    }

    public function show($id)
    {
        $supplier = $this->supplierRepository->find($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = $this->supplierRepository->find($id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $this->supplierRepository->update($request->all(), $id);
        session()->flash('update', 'Fournisseur modifié avec succès !');
        return redirect('suppliers');
    }

    public function destroy($id)
    {
        $this->supplierRepository->delete($id);
    }
}
