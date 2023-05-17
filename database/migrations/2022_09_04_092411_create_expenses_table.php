<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exp_cat_id');
            $table->string('reference_no')->unique();
            $table->string('expense_title');
            $table->string('amount');
            $table->longText('expense_note');
            $table->longText('attachment')->nullable();
            $table->string('expense_date');
            $table->timestamps();

            $table->foreign('exp_cat_id')->references('id')->on('expense_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
