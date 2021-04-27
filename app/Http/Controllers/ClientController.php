<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientController extends Controller
{

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients =$this->clientRepository->all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        $this->clientRepository->addClient($request->all());
        session()->flash('success', 'Client has been added');
        return redirect('clients');
    }

    public function show($id)
    {
        $client = $this->clientRepository->find($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = $this->clientRepository->find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $this->clientRepository->updateClient($request->all(), $id);
        session()->flash('update', 'Client has been added');
        return redirect('clients');
    }

    public function destroy($id)
    {
        $this->clientRepository->delete($id);
    }

    public function export(){
        return $this->clientRepository->exportClientsDataAsExcel();
    }
}
