<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const TABLE_NAME = 'task';
    protected $table = self::TABLE_NAME;

    protected $fillable = ['name', 'priority'];

}
