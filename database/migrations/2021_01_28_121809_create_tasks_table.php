<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index('uuid');

            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->foreignId('project_stage_id');
            $table->foreign('project_stage_id')->references('id')->on('project_stages');

            $table->string('name');

            $table->longText('description')->nullable();

            $table->string('role', 255);
            $table->timestamps();

            $table->foreignId('created_by');
            $table->foreign('created_by')->references('id')->on('users');

            $table->foreignId('updated_by');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
