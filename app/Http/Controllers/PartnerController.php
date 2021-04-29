<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Repositories\Interfaces\PartnerRepositoryInterface;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //
    private $partnerRepository;

    public function __construct(PartnerRepositoryInterface $partnerRepository){
        $this->middleware('auth');
        $this->partnerRepository = $partnerRepository;
    }

    public function index()
    {
        $partners =$this->partnerRepository->all();
        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        return view('partners.create');
    }

    public function store(PartnerRequest $request)
    {
        $this->partnerRepository->addPartner($request->all());
        session()->flash('success', 'Partner has been added');
        return redirect('/partners');
    }

    public function show($id)
    {
        $partners = $this->partnerRepository->find($id);
        return view('partners.show', compact('partners'));
    }

    public function edit($id)
    {
        $partners = $this->partnerRepository->find($id);
        return view('partners.edit', compact('partners'));
    }

    public function update(PartnerRequest $request, $id)
    {
        $this->partnerRepository->updatePartner($request->all(), $id);
        session()->flash('update', 'Partner has been added');
        return redirect('/partners');
    }

    public function destroy($id)
    {
        $this->partnerRepository->delete($id);
    }

    public function export(){
        return $this->partnerRepository->exportPartnersDataAsExcel();
    }
}
