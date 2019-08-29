<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categoryname');
            $table->string('reason')->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->integer('amount')->default(0);
            $table->string('doneby')->nullable();
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
        Schema::dropIfExists('daily_expenses');
    }
}
