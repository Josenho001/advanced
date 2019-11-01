<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('name');
              $table->enum('gender',['F','M']);
            $table->string('skin');
            $table->string('last');
            $table->float('height')->nullable();
            $table->float('avg')->nullable();
            $table->string('mind');
            $table->string('cloth');
            $table->string('parent');
            $table->integer('phone');

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
        Schema::dropIfExists('missing');
    }
}
