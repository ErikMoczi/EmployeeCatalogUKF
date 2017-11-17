<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeHasPublicationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_has_publication';

    /**
     * Run the migrations.
     * @table employee_has_publication
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('publication_id');

            $table->index(["publication_id"], 'fk_employee_has_publication_publication1_idx');

            $table->index(["employee_id"], 'fk_employee_has_publication_employee1_idx');


            $table->foreign('employee_id', 'fk_employee_has_publication_employee1_idx')
                ->references('id')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('publication_id', 'fk_employee_has_publication_publication1_idx')
                ->references('id')->on('publication')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['employee_id', 'publication_id']);
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
