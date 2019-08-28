<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transactiontype');
            $table->integer('amount')->default(0);
            $table->string('doneby')->nullable();
            $table->string('ext')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('bankings');
    }
}
