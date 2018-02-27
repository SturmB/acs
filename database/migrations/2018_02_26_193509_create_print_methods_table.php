<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_methods', function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('PK. The short name of the print method. i.e., “Traditions”.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the print method is active.');
            $table->string('long_name', 250)
                ->nullable()
                ->comment('The long name of the print method. i.e., “American Traditions”.');
            $table->string('prefix', 10)
                ->nullable()
                ->comment('The prefix used in combination with the item number of a product.');
            $table->text('short_description')
                ->nullable()
                ->comment('A short, one-sentence description of the print method.');
            $table->text('long_description')
                ->nullable()
                ->comment('A long description of the print method; generally one paragraph in length.');
            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('print_methods');
    }
}
