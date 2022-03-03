<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('register_ip');
            $table->string('last_ip');
            $table->string('blurb', 2000)->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('banned')->default(false);
            $table->string('ban_reason')->nullable();
            $table->datetime('banned_until')->nullable();
            $table->bigInteger('money')->default(0);
            $table->string('invite_key')->nullable();
            $table->rememberToken();
            $table->datetime('joined')->useCurrent();
            $table->datetime('last_online')->useCurrent();
            $table->datetime('last_daily_reward')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
