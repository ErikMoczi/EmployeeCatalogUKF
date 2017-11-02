<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('first_name', 45);
            $table->string('middle_name', 45)->nullable();
            $table->string('last_name', 45);
            $table->string('full_name', 45);
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('departmen_id');

            $table->index(["departmen_id"], 'fk_employee_departmen1_idx');

            $table->index(["position_id"], 'fk_employee_position_idx');
            $table->timestamps();


            $table->foreign('position_id', 'fk_employee_position_idx')
                ->references('id')->on('position')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('departmen_id', 'fk_employee_departmen1_idx')
                ->references('id')->on('departmen')
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
