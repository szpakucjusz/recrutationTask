<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public const TABLE_NAME = 'task';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

}
