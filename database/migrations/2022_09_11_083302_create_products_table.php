<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('product_name');
            $table->string('unit_type');
            $table->string('product_quantity');
            $table->string('product_weight');
            $table->string('number_of_packet');
            $table->string('total_quantity');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            // $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
