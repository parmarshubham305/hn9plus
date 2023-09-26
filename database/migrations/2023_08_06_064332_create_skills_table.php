<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Graphics', 'Frontend', 'Backend', 'Mobile', 'Database', 'CMS / eCommerce', 'Platform / BI Tools', 'Cloud / DevOps'])->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
            $table->double('price', [10,2])->default(0);
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('skills');
    }
}
