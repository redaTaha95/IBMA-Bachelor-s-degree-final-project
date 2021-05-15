<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $this->taskRepository->create($request->all());
        return redirect('tasks');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = $this->taskRepository->find($id);
        return view('');
    }

    public function update(TaskRequest $request, $id)
    {
        $this->taskRepository->update($request->all(), $id);
        return redirect('tasks');
    }

    public function destroy($id)
    {
        $this->taskRepository->delete($id);
    }
}
