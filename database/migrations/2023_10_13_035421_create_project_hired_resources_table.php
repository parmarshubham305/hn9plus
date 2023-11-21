<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectHiredResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_hired_resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->longText('resources');
            $table->foreign('project_id')
            ->references('id')->on('projects')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_hired_resources');
    }
}
