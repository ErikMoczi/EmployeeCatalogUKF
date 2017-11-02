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
            $table->increments('id');
            $table->string('name', 45);
            $table->string('acronym', 45)->nullable();
            $table->unsignedInteger('faculty_id');

            $table->index(["faculty_id"], 'fk_departmen_faculty1_idx');

            $table->unique(["name"], 'name_UNIQUE');
            $table->timestamps();


            $table->foreign('faculty_id', 'fk_departmen_faculty1_idx')
                ->references('id')->on('faculty')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
