<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEmployeeHasActivityTable
 */
class CreateEmployeeHasActivityTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_has_activity';

    /**
     * Run the migrations.
     * @table employee_has_activity
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('activity_id');

            $table->index(["activity_id"], 'fk_employee_has_activity_activity1_idx');

            $table->index(["employee_id"], 'fk_employee_has_activity_employee1_idx');


            $table->foreign('employee_id', 'fk_employee_has_activity_employee1_idx')
                ->references('id')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('activity_id', 'fk_employee_has_activity_activity1_idx')
                ->references('id')->on('activity')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['employee_id', 'activity_id']);
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
