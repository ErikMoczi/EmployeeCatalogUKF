<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeHasProjectTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_has_project';

    /**
     * Run the migrations.
     * @table employee_has_project
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('project_id');

            $table->index(["employee_id"], 'fk_employee_has_project_employee1_idx');

            $table->index(["project_id"], 'fk_employee_has_project_project1_idx');


            $table->foreign('employee_id', 'fk_employee_has_project_employee1_idx')
                ->references('id')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('project_id', 'fk_employee_has_project_project1_idx')
                ->references('id')->on('project')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['employee_id', 'project_id']);
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
