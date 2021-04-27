<?php


namespace App\Http\Controllers;


use App\Http\Requests\MaterialRequest;
use App\Repositories\Interfaces\MaterialRepositoryInterface;

class MaterialController extends Controller
{
    private $materialRepository;

    public function __construct(MaterialRepositoryInterface $materialRepository)
    {
        $this->middleware('auth');
        $this->materialRepository = $materialRepository;
    }

    public function index()
    {
        $materials =$this->materialRepository->all();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(MaterialRequest $request)
    {
        $this->materialRepository->create($request->all());
        session()->flash('success', 'Material has been added');
        return redirect('/materials');
    }

    public function show($id)
    {
        $material = $this->materialRepository->find($id);
        return view('materials.show', compact('material'));
    }

    public function edit($id)
    {
        $material = $this->materialRepository->find($id);
        return view('materials.edit', compact('material'));
    }

    public function update(MaterialRequest $request, $id)
    {
        $this->materialRepository->update($request->all(), $id);
        session()->flash('update', 'Material has been added');

        return redirect('/materials');

    }

    public function destroy($id)
    {
        $this->materialRepository->delete($id);
    }

    public function export(){
        return $this->materialRepository->exportMaterialsDataAsExcel();
    }

}
