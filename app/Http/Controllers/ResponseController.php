<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ResponseRepositoryInterface;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

    private $responseRepository;

    public function __construct(ResponseRepositoryInterface $responseRepository)
    {
        $this->responseRepository = $responseRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->responseRepository->create($request->all());
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
