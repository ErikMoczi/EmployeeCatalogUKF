<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityHasAuthorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'activity_has_author';

    /**
     * Run the migrations.
     * @table activity_has_author
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('activity_id');
            $table->unsignedInteger('author_id');

            $table->index(["author_id"], 'fk_activity_has_author_author1_idx');

            $table->index(["activity_id"], 'fk_activity_has_author_activity1_idx');


            $table->foreign('activity_id', 'fk_activity_has_author_activity1_idx')
                ->references('id')->on('activity')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('author_id', 'fk_activity_has_author_author1_idx')
                ->references('id')->on('author')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['activity_id', 'author_id']);
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
