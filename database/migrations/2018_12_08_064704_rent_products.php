<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RentProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',255)->nullable(false);
                $table->dateTime('create_at');
                $table->string('image')->default('default.jpg');
                $table->dateTime('edit_at');
                $table->decimal('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_products');
    }
}
