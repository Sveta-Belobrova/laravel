<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductCategory', function(Blueprint $table) {
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('name');
            $table->string('slug');
            $table ->unsignedBigInteger('ordering')->default(0);
            $table ->unsignedBigInteger('parent_id')->null();
            $table ->unsignedBigInteger('image_id')->null();
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   /* public function down()
    {
        Schema::dropIfExists('products');
    }*/
}
