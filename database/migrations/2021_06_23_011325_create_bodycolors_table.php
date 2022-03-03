<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_colors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('head_color')->default(1);
            $table->integer('torso_color')->default(1010);
            $table->integer('left_arm_color')->default(1);
            $table->integer('right_arm_color')->default(1);
            $table->integer('left_leg_color')->default(26);
            $table->integer('right_leg_color')->default(26);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_colors');
    }
}
