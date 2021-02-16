<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->index('uuid');
            $table->morphs('commentable');

            $table->longText('content');

            $table->foreignId('parent_id');
            $table->foreign('parent_id')->references('id')->on('comments');

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
        Schema::dropIfExists('comments');
    }
}
