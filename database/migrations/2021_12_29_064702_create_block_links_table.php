<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('block_id')->unsigned()->references('id')->on('blocks')->onDelete('cascade')->onUpdate('cascade');
            $table->string('icon', 160)->nullable();
            $table->string('link')->notNullable();
            $table->string('name')->notNullable();
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
        Schema::dropIfExists('block_links');
    }
}
