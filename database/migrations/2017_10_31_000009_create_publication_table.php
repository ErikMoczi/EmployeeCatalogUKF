<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'publication';

    /**
     * Run the migrations.
     * @table publication
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_publication');
            $table->string('ISBN', 25)->nullable();
            $table->string('title');
            $table->string('sub_titile', 100)->nullable();
            $table->decimal('page', 4, 0)->default('0');
            $table->decimal('year', 4, 0)->nullable();
            $table->unsignedInteger('id_publication_type');
            $table->unsignedInteger('id_publisher');

            $table->index(["id_publisher"], 'fk_publication_publisher1_idx');

            $table->index(["id_publication_type"], 'fk_publication_publication_type1_idx');

            $table->unique(["title"], 'title_UNIQUE');


            $table->foreign('id_publication_type', 'fk_publication_publication_type1_idx')
                ->references('id_publication_type')->on('publication_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_publisher', 'fk_publication_publisher1_idx')
                ->references('id_publisher')->on('publisher')
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
