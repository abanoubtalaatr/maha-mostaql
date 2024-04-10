<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id');
            $table->string('link')->nullable();
            $table->integer('price_from');
            $table->integer('price_to');
            $table->string('period');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('status')->default(\App\Constants\ProjectStatus::REVIEW);
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
        Schema::dropIfExists('projects');
    }
}
