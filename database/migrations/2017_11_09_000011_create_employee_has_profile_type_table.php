<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEmployeeHasProfileTypeTable
 */
class CreateEmployeeHasProfileTypeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_has_profile_type';

    /**
     * Run the migrations.
     * @table employee_has_profile_type
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('profile_type_id');
            $table->text('value');

            $table->index(["employee_id"], 'fk_employee_has_profile_type_employee1_idx');

            $table->index(["profile_type_id"], 'fk_employee_has_profile_type_profile_type1_idx');


            $table->foreign('employee_id', 'fk_employee_has_profile_type_employee1_idx')
                ->references('id')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('profile_type_id', 'fk_employee_has_profile_type_profile_type1_idx')
                ->references('id')->on('profile_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['employee_id', 'profile_type_id']);
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
