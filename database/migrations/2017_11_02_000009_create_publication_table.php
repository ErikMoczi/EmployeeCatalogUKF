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
            $table->increments('id');
            $table->string('ISBN', 25)->nullable();
            $table->string('title');
            $table->string('sub_titile', 100)->nullable();
            $table->decimal('page', 4, 0)->default('0');
            $table->decimal('year', 4, 0)->nullable();
            $table->unsignedInteger('publisher_id');
            $table->unsignedInteger('publication_type_id');

            $table->index(["publisher_id"], 'fk_publication_publisher1_idx');

            $table->index(["publication_type_id"], 'fk_publication_publication_type1_idx');

            $table->unique(["title", "ISBN"], 'name_UNIQUE');
            $table->timestamps();


            $table->foreign('publisher_id', 'fk_publication_publisher1_idx')
                ->references('id')->on('publisher')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('publication_type_id', 'fk_publication_publication_type1_idx')
                ->references('id')->on('publication_type')
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
