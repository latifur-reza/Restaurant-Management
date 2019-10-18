<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderno');
            $table->string('invoiceno');
            $table->string('waiter')->nullable();
            $table->integer('total')->default(0);
            $table->integer('discounttotalpercent')->default(0);
            $table->integer('discounttotalcash')->default(0);
            $table->integer('vat')->default(0);
            $table->integer('servicecharge')->default(0);
            $table->integer('grandtotal')->default(0);
            $table->integer('receivedcash')->default(0);
            $table->integer('change')->nullable();
            $table->string('paytype');
            $table->string('transactionno')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('reserved_details');
    }
}
