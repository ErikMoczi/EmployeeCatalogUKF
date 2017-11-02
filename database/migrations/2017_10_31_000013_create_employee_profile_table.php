<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfileTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_profile';

    /**
     * Run the migrations.
     * @table employee_profile
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_employee');
            $table->unsignedInteger('id_profile_type');
            $table->text('value');

            $table->index(["id_profile_type"], 'fk_employee_profile_profile_type1_idx');

            $table->index(["id_employee"], 'fk_employee_profile_employee1_idx');


            $table->foreign('id_employee', 'fk_employee_profile_employee1_idx')
                ->references('id_employee')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_profile_type', 'fk_employee_profile_profile_type1_idx')
                ->references('id_profile_type')->on('profile_type')
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
