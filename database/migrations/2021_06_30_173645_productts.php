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
        Schema::create('products', function(Blueprint $table) {
            $table->id(); //это Id можете через ctrl+лкм посмотреть что в функиии id, после сразу
            //unsigned и autoincrement создается
            $table->string('name'); //Функия- тип данных, внутри названияя столбца
            $table->string('description'); //в документации можете посмотреть какие бывают типы
            $table ->integer('price');
            $table ->timestamps(); //создает 2 поля created_at -дата создания, Updated_at - дата изменения
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
