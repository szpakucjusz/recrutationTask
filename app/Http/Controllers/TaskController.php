<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTask;
use App\Model\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @description https://laravel.com/docs/5.8/controllers#resource-controllers
 */
class TaskController extends Controller
{
    public function index()
    {
        return view('task.index', ['tasks' => Task::all()]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(StoreTask $request)
    {
        Task::create($request->all());
        return redirect('/task')->with('success', 'Successfully added task with name: ' . $request['name']);
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        return 'edit';
    }

    public function update(Request $request, $id)
    {
        return 'update';
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/task')->with('success', 'Successfully deleted task with name: ' . $task->name);
    }
}
