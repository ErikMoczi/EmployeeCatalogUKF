<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationHasAuthorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'publication_has_author';

    /**
     * Run the migrations.
     * @table publication_has_author
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('publication_id');
            $table->unsignedInteger('author_id');

            $table->index(["author_id"], 'fk_publication_has_author_author1_idx');

            $table->index(["publication_id"], 'fk_publication_has_author_publication1_idx');


            $table->foreign('publication_id', 'fk_publication_has_author_publication1_idx')
                ->references('id')->on('publication')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('author_id', 'fk_publication_has_author_author1_idx')
                ->references('id')->on('author')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['publication_id', 'author_id']);
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
