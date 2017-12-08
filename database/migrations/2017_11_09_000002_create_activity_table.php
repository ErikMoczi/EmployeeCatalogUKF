<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateActivityTable
 */
class CreateActivityTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'activity';

    /**
     * Run the migrations.
     * @table activity
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('key', 10);
            $table->string('title', 255)->default('N/A');
            $table->string('date', 100)->nullable();
            $table->string('country', 5)->default('N/A');
            $table->string('type', 40)->default('N/A');
            $table->string('category', 100)->default('N/A');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE ' . $this->set_schema_table . ' ADD FULLTEXT fulltext_title_idx(title)');
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
