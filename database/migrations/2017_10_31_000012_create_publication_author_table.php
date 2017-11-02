<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationAuthorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'publication_author';

    /**
     * Run the migrations.
     * @table publication_author
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_publication');
            $table->unsignedInteger('id_author');

            $table->index(["id_publication"], 'fk_publication_author_publication1_idx');

            $table->index(["id_author"], 'fk_publication_author_author1_idx');


            $table->foreign('id_publication', 'fk_publication_author_publication1_idx')
                ->references('id_publication')->on('publication')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_author', 'fk_publication_author_author1_idx')
                ->references('id_author')->on('author')
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
