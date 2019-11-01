<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identified', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('height');
            $table->float('avg_weight');
            $table->text('body_marks');
           // $table->binary('photo')->nullable();
            $table->enum('gender',['F','M']);
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
        Schema::dropIfExists('identified');
    }
}
