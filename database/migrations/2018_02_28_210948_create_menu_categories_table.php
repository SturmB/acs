<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCategoriesTable extends Migration
{
    private $tableName = 'menu_categories';
    private $tableComment = 'Primary menu item names and their order.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('The name of the Menu Category. Ties together with the priority column.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the Menu Category is active (will be shown).');
            $table->tinyInteger('priority')
                ->default(40)
                ->comment('Grouping and Priority in one column! This is for the navigation list (usually a navbar), with higher numbers appearing later in the list.');
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
