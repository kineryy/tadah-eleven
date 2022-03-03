<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->default('New Asset');
            $table->string('description', 2000)->default('No description.');
            $table->string('thumbnail_url')->nullable();
            $table->bigInteger('creator')->default(1);
            $table->bigInteger('price')->default(0);
            $table->boolean('onsale')->default(true);
            $table->boolean('approved')->default(false);
            $table->string('type');
            $table->bigInteger('sales')->default(0);
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
        Schema::dropIfExists('items');
    }
}
