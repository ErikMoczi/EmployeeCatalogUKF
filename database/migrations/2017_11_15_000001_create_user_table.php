<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserTable
 */
class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'user';

    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->unsignedInteger('employee_id')->nullable();
            $table->boolean('admin_flag')->default(0);
            $table->rememberToken();

            $table->unique(["email"], 'email_UNIQUE');
            $table->unique(["employee_id"], 'employee_id_UNIQUE');

            $table->index(["employee_id"], 'fk_user_employee1_idx');

            $table->foreign('employee_id', 'fk_user_employee1')
                ->references('id')->on('employee')
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
