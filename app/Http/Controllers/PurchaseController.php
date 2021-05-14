<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\PurchaseRepositoryInterface;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    private $purchaseRepository;

    public function __construct(PurchaseRepositoryInterface $purchaseRepository){
        $this->middleware('auth');
        $this->purchaseRepository = $purchaseRepository;
    }

    public function index()
    {
        $purchases =$this->purchaseRepository->all();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $products = $this->purchaseRepository->getProducts();
        return view('purchases.create',compact('products'));
    }

    public function store(PurchaseRequest $request)
    {
        $this->purchaseRepository->addPurchase($request->all());
        session()->flash('success', 'Purchase has been added');
        return redirect('/purchases');
    }

    public function show($id)
    {
        $purchase = $this->purchaseRepository->find($id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = $this->purchaseRepository->find($id);
        $products = $this->purchaseRepository->getProducts();
        return view('purchases.edit', compact('purchase','products'));

    }

    public function update(PUrchaseRequest $request, $id)
    {
        $this->purchaseRepository->updatePurchase($request->all(), $id);
        session()->flash('update', 'Purchase has been added');
        return redirect('/purchases');
    }

    public function destroy($id)
    {
        $this->purchaseRepository->delete($id);
    }

    public function export(){
        return $this->purchaseRepository->exportPurchasesDataAsExcel();
    }
}
