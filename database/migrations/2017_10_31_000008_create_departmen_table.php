<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmenTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'departmen';

    /**
     * Run the migrations.
     * @table departmen
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_departmen');
            $table->string('name', 45);
            $table->string('acronym', 45)->nullable();
            $table->unsignedInteger('id_faculty');

            $table->index(["id_faculty"], 'fk_departmen_faculty1_idx');

            $table->unique(["name"], 'name_UNIQUE');


            $table->foreign('id_faculty', 'fk_departmen_faculty1_idx')
                ->references('id_faculty')->on('faculty')
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
