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
            $table->increments('id');
            $table->string('key', 50);
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->unsignedInteger('activity_type_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('activity_category_id')->nullable();

            $table->index(["country_id"], 'fk_activity_country1_idx');

            $table->index(["activity_category_id"], 'fk_activity_activity_category1_idx');

            $table->index(["activity_type_id"], 'fk_activity_activity_type1_idx');
            $table->timestamps();


            $table->foreign('activity_type_id', 'fk_activity_activity_type1_idx')
                ->references('id')->on('activity_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('country_id', 'fk_activity_country1_idx')
                ->references('id')->on('country')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('activity_category_id', 'fk_activity_activity_category1_idx')
                ->references('id')->on('activity_category')
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
