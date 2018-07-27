<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    private $tableName = 'notes';
    private $tableComment = 'Prioritized list of features for various Products.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->string('id', 45)
                ->comment('The short name of the stamping method.');
            $table->tinyInteger('active')
                ->default(1)
                ->comment('Boolean value for whether or not the Note is active.');
            $table->string('title', 250)
                ->comment('The title of the note. Preferably only 1–5 words.');
            $table->text('body')
                ->comment('The body of the note tht will be displayed on the web page, with HTML structuring.');
            $table->tinyInteger('priority')
                ->comment('The order in which Notes should be listed when displayed to the user, from low to high. (Lower numbers appear earlier.)');
            $table->timestamps();

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
