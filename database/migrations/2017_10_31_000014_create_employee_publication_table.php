<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePublicationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_publication';

    /**
     * Run the migrations.
     * @table employee_publication
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_employee');
            $table->unsignedInteger('id_publication');

            $table->index(["id_publication"], 'fk_employee_publication_publication1_idx');

            $table->index(["id_employee"], 'fk_employee_publication_employee1_idx');


            $table->foreign('id_employee', 'fk_employee_publication_employee1_idx')
                ->references('id_employee')->on('employee')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_publication', 'fk_employee_publication_publication1_idx')
                ->references('id_publication')->on('publication')
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
