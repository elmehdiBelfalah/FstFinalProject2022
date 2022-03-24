<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
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
            $table->text('name');
            $table->string('size');
            $table->char('sex'); // m =>male , f=>female
            $table->float('price');
            $table->text('description');
            $table->text('reference');
            $table->integer('rate')->min(0)->max(5); // prodcut rating 
            $table->integer('reviews'); // prodcut rating 
            $table->integer('quantity'); // prodcut rating 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();


            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
