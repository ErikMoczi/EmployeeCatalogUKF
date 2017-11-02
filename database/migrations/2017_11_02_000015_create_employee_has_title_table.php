<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeHasTitleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_has_title';

    /**
     * Run the migrations.
     * @table employee_has_title
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('title_id');
            $table->unsignedInteger('order');

            $table->index(["employee_id"], 'fk_employee_has_title_employee1_idx');

            $table->index(["title_id"], 'fk_employee_has_title_title1_idx');


            $table->foreign('employee_id', 'fk_employee_has_title_employee1_idx')
                ->references('id')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('title_id', 'fk_employee_has_title_title1_idx')
                ->references('id')->on('title')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['employee_id', 'title_id']);
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
