<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintMethodsTable extends Migration
{
    private $tableName = 'print_methods';
    private $tableComment = 'Overarching methods by which a logo is printed onto a Product.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('' . $this->tableName . '', function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('PK. The short name of the Print Method. i.e., “Traditions”.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the Print Method is active.');
            $table->string('long_name', 250)
                ->nullable()
                ->comment('The long name of the Print Method. i.e., “American Traditions”.');
            $table->string('prefix', 10)
                ->nullable()
                ->comment('The prefix used in combination with the id of a Product.');
            $table->text('short_description')
                ->nullable()
                ->comment('A short, one-sentence description of the Print Method.');
            $table->text('long_description')
                ->nullable()
                ->comment('A long description of the Print Method; generally one paragraph in length.');
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
