<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateEmployeeTable
 */
class CreateEmployeeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee';

    /**
     * Run the migrations.
     * @table employee
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('first_name', 25);
            $table->string('middle_name', 25)->nullable();
            $table->string('last_name', 25);
            $table->string('full_name', 100);
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('department_id');

            $table->index(["position_id"], 'fk_employee_position1_idx');

            $table->index(["department_id"], 'fk_employee_department1_idx');
            $table->timestamps();

            $table->foreign('position_id', 'fk_employee_position1_idx')
                ->references('id')->on('position')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('department_id', 'fk_employee_department1_idx')
                ->references('id')->on('department')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        DB::statement('ALTER TABLE ' . $this->set_schema_table . ' ADD FULLTEXT fulltext_name_idx(first_name, middle_name, last_name)');
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
