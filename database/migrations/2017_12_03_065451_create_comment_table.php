<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'comment';

    /**
     * Run the migrations.
     * @table comment
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
            $table->text('comment');
            $table->unsignedInteger('employee_id');
            $table->boolean('approved')->default(0);

            $table->index(["employee_id"], 'fk_comment_employee1_idx');

            $table->foreign('employee_id', 'fk_comment_employee1')
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
