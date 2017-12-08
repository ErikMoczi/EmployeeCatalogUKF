<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateFacultyTable
 */
class CreateFacultyTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'faculty';

    /**
     * Run the migrations.
     * @table faculty
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 50)->default('N/A');
            $table->string('acronym', 20)->nullable();

            $table->unique(["name"], 'name_UNIQUE');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE ' . $this->set_schema_table . ' ADD FULLTEXT fulltext_name_idx(name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}
