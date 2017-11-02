<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'title';

    /**
     * Run the migrations.
     * @table title
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_title');
            $table->string('name', 45);
            $table->unsignedInteger('id_title_type');

            $table->index(["id_title_type"], 'fk_title_title_type1_idx');

            $table->unique(["name"], 'name_UNIQUE');


            $table->foreign('id_title_type', 'fk_title_title_type1_idx')
                ->references('id_title_type')->on('title_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
