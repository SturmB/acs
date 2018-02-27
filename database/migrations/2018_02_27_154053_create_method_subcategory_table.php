<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodSubcategoryTable extends Migration
{
    private $tableName = 'method_subcategory';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('print_method_id', 45)
                ->comment('The Print Method. NULL means it is an unprintable item (such as lids, straws, or utensils).');
            $table->string('product_subcategory_id', 45)
                ->comment('Foreign key of the Product Subcategory.');
            $table->string('product_category_id', 45)
                ->comment('Foreign key of the Product Category.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the Product Subcategory/Print Method combination is active.');
            $table->string('coupon_code_id', 45)
                ->comment('Foreign key to denote the Coupon Code for this Product Subcategory/Print Method combination.');
            $table->tinyInteger('second_side')
                ->default(0)
                ->comment('Boolean value for whether or not this Product Subcategory/Print Method combo has a second side that’s printable. (Called “per panel” for offset napkins.)');
            $table->tinyInteger('wrap')
                ->default(0)
                ->comment('Boolean value for whether or not this Product Subcategory/Print Method combo has the capability to be printed as a wrap (first and second side together).');
            $table->tinyInteger('bleed')
                ->default(0)
                ->comment('Boolean value for whether or not this Product Subcategory/Print Method combo has the capability to be printed as a bleed.');
            $table->tinyInteger('multicolor')
                ->default(1)
                ->comment('Boolean value for whether or not this Product Subcategory/Print Method combo can be printed with more than one color. (Digital method irrelevant for determining the “per color” tag.)');
            $table->tinyInteger('per_thousand')
                ->default(0)
                ->comment('True/False (Boolean). True if the prices for this product/color/method combo is measured per thousand.');
            $table->smallInteger('setup_charge')
                ->unsigned()
                ->default(40)
                ->comment('Amount to charge for setup.');
            $table->timestamps();

            $table->primary(['print_method_id', 'product_subcategory_id', 'product_category_id'], 'method_subcategory_primary');
            $table->foreign('print_method_id')
                ->references('id')->on('print_methods')
                ->onUpdate('cascade');
            $table->foreign('product_subcategory_id')
                ->references('id')->on('product_subcategories')
                ->onUpdate('cascade');
            $table->foreign('product_category_id')
                ->references('product_category_id')->on('product_subcategories')
                ->onUpdate('cascade');
            $table->foreign('coupon_code_id')
                ->references('id')->on('coupon_codes')
                ->onUpdate('cascade');
        });

        DB::statement("ALTER TABLE {$this->tableName} COMMENT 'The main Print Method and Product Category/Subcategory that represents each page in the catalog.'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
