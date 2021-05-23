<?php

namespace App\Http\Controllers;

use App\Http\Requests\TasksListRequest;
use App\Repositories\Interfaces\TasksListRepositoryInterface;
use Illuminate\Http\Request;

class TasksListController extends Controller
{

    private $tasksListRepository;

    public function __construct(TasksListRepositoryInterface $tasksListRepository)
    {
        $this->tasksListRepository = $tasksListRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(TasksListRequest $request)
    {
        $this->tasksListRepository->create($request->all());
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
        $this->tasksListRepository->update($request->all(), $id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->tasksListRepository->delete($id);
    }
}
