<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTitleTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'employee_title';

    /**
     * Run the migrations.
     * @table employee_title
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_employee');
            $table->unsignedInteger('id_title');
            $table->unsignedInteger('order');

            $table->index(["id_employee"], 'fk_employee_title_employee1_idx');

            $table->index(["id_title"], 'fk_employee_title_title1_idx');

            $table->unique(["order", "id_title", "id_employee"], 'order_UNIQUE');


            $table->foreign('id_title', 'fk_employee_title_title1_idx')
                ->references('id_title')->on('title')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_employee', 'fk_employee_title_employee1_idx')
                ->references('id_employee')->on('employee')
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
