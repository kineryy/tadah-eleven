<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('servers');

        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->default('My Server');
            $table->string('description', 250)->default("No description.");
            $table->bigInteger('creator');
            $table->string('ip');
            $table->string('port');
            $table->string('secret');
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
        Schema::dropIfExists('servers');
    }
}
