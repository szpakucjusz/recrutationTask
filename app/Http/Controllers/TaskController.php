<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Model\Project;
use App\Model\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @description https://laravel.com/docs/5.8/controllers#resource-controllers
 */
class TaskController extends Controller
{
    public function index()
    {
        return view('task.index', ['tasks' => Task::orderBy('priority', 'DESC')->get()]);
    }

    public function create()
    {
        return view('task.create', ['projects' => Project::all()]);
    }

    public function store(StoreTask $request, TaskService $taskService)
    {
        $taskService->createTaskWithProject($request);
        return redirect('/tasks')->with('success', 'Successfully added task with name: ' . $request['name']);
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit(Task $task)
    {
        return view('task.update', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect('/tasks')->with('success', 'Successfully updated task with name: ' . $request['name']);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks')->with('success', 'Successfully deleted task with name: ' . $task->name);
    }
}
