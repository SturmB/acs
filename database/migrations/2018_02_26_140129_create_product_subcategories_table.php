<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategories', function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('PK1. The short name of the product subcategory.');
            $table->string('product_category_id', 45)
                ->comment('PK2. The foreign key of the main product category to which this subcategory belongs.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the product subcategory is active.');
            $table->string('long_name', 250)
                ->comment('The long name of the product subcategory.');
            $table->timestamps();

            $table->primary(['id', 'product_category_id']);
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_subcategories');
    }
}
