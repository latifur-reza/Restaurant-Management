<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServedCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('served_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('orderno');
            $table->string('invoiceno');
            $table->string('customerid')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('barcode')->nullable();
            $table->string('noofguest')->nullable();
            $table->string('tableno')->nullable();
            $table->string('status');
            $table->string('paymentstatus');
            $table->string('createdby');
            $table->string('updatedby');
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
        Schema::dropIfExists('served_customers');
    }
}
