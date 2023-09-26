<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('skills');
            $table->string('timeline');
            $table->longText('description');
            $table->string('experience_level')->nullable();
            $table->double('estimated_price', [10,2])->nullable();
            $table->string('payment_type');
            $table->enum('quote_type', ['Fixed Rate', 'Hourly Rate'])->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_quotes');
    }
}
