<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identified', function (Blueprint $table) {
            $table->string('pname')->nullable()->after('gender');
            $table->integer('national')->after('pname');
            $table->integer('phone')->nullable()->after('national');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('identified', function (Blueprint $table) {
            //
        });
    }
}
