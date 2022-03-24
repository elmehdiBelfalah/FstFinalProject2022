<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(1); // 1=>ordered  2=>payed 3=>reviwed
            $table->unsignedBigInteger('user_id');
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('total')->nullable();
            $table->string('reference')->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

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
        //
    }
}
