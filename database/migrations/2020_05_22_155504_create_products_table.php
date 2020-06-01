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
            $table->bigIncrements('id');
            $table->string('name', 50)->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('amount')->default(0);
            $table->decimal('actual_price',12,2)->default(0);
            $table->decimal('previous_price', 12,2)->default(0);
            $table->integer('discount_rate')->default(0);
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->text('specifications')->nullable();
            $table->text('interest_information');
            $table->unsignedBigInteger('visits')->default(0);
            $table->unsignedBigInteger('sales')->default(0);
            $table->string('status');
            $table->char('active',2);
            $table->char('main_slider',2);
            $table->timestamps();

            //Foreign
            $table->foreign('category_id')->references('id')->on('categories');
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
