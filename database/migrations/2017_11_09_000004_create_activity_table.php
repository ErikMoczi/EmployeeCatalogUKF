<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'activity';

    /**
     * Run the migrations.
     * @table activity
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 20);
            $table->string('title')->default('Neuvedené');
            $table->date('date')->nullable();
            $table->string('country', 50)->nullable();
            $table->string('type', 50)->default('Neuvedené');
            $table->string('category', 50)->default('Neuvedené');
            $table->text('authors')->nullable();

            $table->primary(['id']);
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
