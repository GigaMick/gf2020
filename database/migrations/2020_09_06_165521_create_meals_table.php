<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('token');
            $table->text('description')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('category')->nullable(); // italian, indian etc
            $table->integer('price')->nullable();
            $table->integer('stock')->nullable(); // amount in stock
            $table->integer('status')->nullable();
            $table->integer('kosher')->nullable();
            $table->integer('vegan')->nullable();
            $table->integer('vegetarian')->nullable();
            $table->string('photo')->nullable();
            $table->integer('type')->nullable(); // 1 = chilled \/ 2 = ready to eat

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
