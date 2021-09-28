<?php namespace CatDesign\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateFieldsTable Migration
 */
class CreateFieldsTable extends Migration
{
    public function up()
    {
        Schema::create('catdesign_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('label', 255);
            $table->boolean('required')->default(0);
            $table->boolean('disable_label')->default(0);
            $table->string('type', 255);
            $table->string('classes', 1024)->nullable();
            $table->string('wrapper_classes', 1024)->nullable();
            $table->string('comment', 1024)->nullable();
            $table->integer('form_id')->unsigned();
            $table->text('value_list')->nullable();
            $table->text('events')->nullable();
            $table->text('attribute')->nullable();
            $table->text('properties')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catdesign_fields');
    }
}
