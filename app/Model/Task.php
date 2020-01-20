<?php
namespace App\Model;

use App\Http\Requests\StoreTask;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const TABLE_NAME = 'task';
    protected $table = self::TABLE_NAME;

    protected $fillable = ['name', 'priority'];

    public function project()
    {
        return $this->belongsTo('App\Model\Project');
    }

    public static function createWithProject(StoreTask $request)
    {
        $task = Task::create($request->all());
        if (0 !== $request->get('project_id')) {
            $project = Project::find($request->get('project_id'));
            $project->tasks()->save($task);
        }
    }

}
