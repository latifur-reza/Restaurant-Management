<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServedMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('served_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderno');
            $table->string('invoiceno');
            $table->string('menucode');
            $table->string('categoryname');
            $table->string('food');
            $table->integer('originalprice')->default(0);
            $table->integer('price')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('discountpercent')->default(0)->nullable();
            $table->integer('discountcash')->default(0)->nullable();
            $table->integer('itemtotal')->default(0);
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
        Schema::dropIfExists('served_menus');
    }
}
