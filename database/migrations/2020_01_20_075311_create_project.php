<?php

use App\Model\Project;
use App\Model\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Project::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::table(Task::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
        });
        DB::table(Project::TABLE_NAME)->insert(['name' => 'test1']);
        DB::table(Project::TABLE_NAME)->insert(['name' => 'test2']);
        DB::table(Project::TABLE_NAME)->insert(['name' => 'test3']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
