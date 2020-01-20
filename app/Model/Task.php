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
}
