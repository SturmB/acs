<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorTypesTable extends Migration
{
    private $tableName = 'color_types';
    private $tableComment = 'Various types of Color for categorization. Used to filter to a certain Color Type.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('PK. The snake_case name of the Color Type.');
            $table->tinyInteger('active')
                ->comment('Boolean value for whether or not the Color Type is active.');
            $table->string('long_name', 250)
                ->comment('The long name of the Color Type. Mostly used for outputting as text to web page.');
            $table->timestamps();

            // Set the table's Primary Key.
            $table->primary('id');
        });

        DB::statement(
            "ALTER TABLE {$this->tableName} COMMENT '{$this->tableComment}'"
        );
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
