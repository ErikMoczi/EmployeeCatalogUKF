<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePublicationTable
 */
class CreatePublicationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'publication';

    /**
     * Run the migrations.
     * @table publication
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ISBN', 25)->nullable();
            $table->string('title', 255);
            $table->string('sub_title', 255)->nullable();
            $table->string('type', 15)->default('N/A');
            $table->string('publisher', 150)->default('N/A');
            $table->decimal('pages', 4, 0)->default(0);
            $table->decimal('year', 4, 0)->nullable();
            $table->string('code', 100)->nullable();

            $table->timestamps();
        });

        DB::statement('ALTER TABLE ' . $this->set_schema_table . ' ADD FULLTEXT fulltext_title_idx(title, sub_title)');
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
