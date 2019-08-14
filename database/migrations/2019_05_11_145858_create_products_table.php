<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title');
            $table->text('note')->nullable();
            $table->bigInteger('cover_id')->unsigned()->nullable();
            $table->double('price');
            $table->double('mileage');
            $table->integer('year');
            $table->string('transmission', 20);
            $table->string('fuel', 20);
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('model_id')->unsigned();
            $table->integer('visits')->default(0);
            $table->bigInteger('created_by')->unsigned();
            $table->enum('status', ['available', 'sold', 'coming_soon'])->default('available');
            $table->boolean('enable')->default(true);
            $table->timestamps();

            $table->foreign('color_id')
                ->references('id')
                ->on('products_colors')
                ->onDelete('restrict');

            $table->foreign('brand_id')
                ->references('id')
                ->on('products_brands')
                ->onDelete('restrict');

            $table->foreign('model_id')
                ->references('id')
                ->on('products_models')
                ->onDelete('restrict');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

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
