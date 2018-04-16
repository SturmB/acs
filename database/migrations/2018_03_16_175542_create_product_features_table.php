<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductFeaturesTable extends Migration
{
    private $tableName = 'product_features';
    private $tableComment = 'Prioritized list of features for various Products.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('' . $this->tableName . '', function (Blueprint $table) {
            $table->smallInteger('id')
                ->comment('PK.
                Also serves as the priority of the feature/option. The higher the priority, the higher on the list it should appear.
                
                29000s and up: Highest priority stuff.
                28000s: Imprint method count.
                27000s: Individual imprint methods.
                    27600-28000: First, main print method detail.
                    27300s: Die methods.
                26000s: Ink & color info.
                25000s: “Optional” info.
                10000-12000: Number of colors possible.
                1000-10000: Item-specific info.
                    1000-2999: Napkins.
                        2000s: Ply count.
                        1000s: Other info.
                    3000s: Coasters.
                    4000s: Drink Stirrers, Food Piks, & Ice Cream Spoons.
                    5000s: Plates.
                    6000-7999: Cups.
                    <1000: Bottom of the list stuff.
                ');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the Product Feature is active.');
            $table->string('feature')
                ->comment('A feature or option for a Product Line.');
            $table->timestamps();

            $table->primary('id');
        });

        DB::statement("ALTER TABLE {$this->tableName} COMMENT '{$this->tableComment}'");
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
