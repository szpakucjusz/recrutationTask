<?php
namespace App\Model;

use App\Http\Requests\StoreTask;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const TABLE_NAME = 'project';

    protected $table = self::TABLE_NAME;

    /**
     * Get the tasks for the project.
     */
    public function tasks()
    {
        return $this->hasMany('App\Model\Task');
    }

    public static function addTask(StoreTask $storeTask, Task $task)
    {
        $project = Project::find($storeTask->get('project_id'));
        $project->tasks()->save($task);
    }
}
