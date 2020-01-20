<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

/**
 * Class TaskController
 * @description https://laravel.com/docs/5.8/controllers#resource-controllers
 */
class TasksController extends Controller
{
    public function repriorities(Request $request)
    {
        if($request->get('ids')) {
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
