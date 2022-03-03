<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

class CreateInviteKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invite_keys');

        Schema::create('invite_keys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('creator')->default(1);
            $table->string('token');
            $table->integer('uses')->default(1);
            $table->timestamps();
        });

        DB::table('invite_keys')->insert(
            array(
                'creator' => 1,
                'token' => 'TadahKey-1704developertesting',
                'uses' => 1
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invite_keys');
    }
}
