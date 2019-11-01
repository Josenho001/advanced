<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidentifiedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidentified', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('height');
            $table->float('avg');
            $table->text('marks');
            $table->string('skin');
            $table->enum('gender', ['male','female']);
            $table->string('area');
            $table->string('ob');
            $table->string('pname');
            $table->integer('national');
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
        Schema::dropIfExists('unidentified');
    }
}
