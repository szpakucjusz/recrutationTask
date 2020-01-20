<?php
namespace App\Services;

use App\Http\Requests\StoreTask;
use App\Model\Project;
use App\Model\Task;

class TaskService
{
    public function createTaskWithProject(StoreTask $storeTask)
    {
        Project::addTask($storeTask, Task::create($storeTask->all()));
    }
}
