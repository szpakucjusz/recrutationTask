<?php

namespace App\Http\Controllers;

use App\Model\Project;
use App\Model\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @description https://laravel.com/docs/5.8/controllers#resource-controllers
 */
class TasksController extends Controller
{
    public function list(Request $request)
    {
        if ($request->get('project')) {
            $tasks = Task::where('project_id', $request->get('project'))->orderBy('priority', 'DESC')->get();
        } else {
            $tasks = Task::orderBy('priority', 'DESC')->get();
        }
        return view('task.index', ['tasks' => $tasks, 'projects' => Project::all()]);
    }

    public function repriorities(Request $request)
    {
        if ($request->get('ids')) {
            $i = count($request->get('ids'));
            foreach($request->get('ids') as $id)
            {
                $item = Task::find($id);
                $item->priority = $i;
                $item->save();
                $i--;
            }
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}
