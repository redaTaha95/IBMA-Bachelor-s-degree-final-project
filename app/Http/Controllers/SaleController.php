<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
    private $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository){
        $this->middleware('auth');
        $this->saleRepository = $saleRepository;
    }

    public function index()
    {
        $sales =$this->saleRepository->all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = $this->saleRepository->getProducts();
        return view('sales.create',compact('products'));
    }

    public function store(SaleRequest $request)
    {
        $this->saleRepository->addSale($request->all());
        session()->flash('success', 'Sale has been added');
        return redirect('/sales');
    }

    public function show($id)
    {
        $sale = $this->saleRepository->find($id);
        return view('sales.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = $this->saleRepository->find($id);
        $products = $this->saleRepository->getProducts();
        return view('sales.edit', compact('sale','products'));

    }

    public function update(SaleRequest $request, $id)
    {
        $this->saleRepository->updateSale($request->all(), $id);
        session()->flash('update', 'Sale has been added');
        return redirect('/sales');
    }

    public function destroy($id)
    {
        $this->saleRepository->delete($id);
    }

    public function export(){
        return $this->saleRepository->exportSalesDataAsExcel();
    }
}
