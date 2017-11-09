<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('title');
            $table->string('sub_titile', 100)->nullable();
            $table->text('authors')->nullable();
            $table->string('type', 50)->default('Neuvedené');
            $table->string('publisher', 50)->default('Neuvedené');
            $table->decimal('pages', 4, 0)->default('0');
            $table->decimal('year', 4, 0)->nullable();
            $table->string('code', 50)->nullable();

            $table->unique(["title", "ISBN"], 'name_UNIQUE');
            $table->timestamps();
        });
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
