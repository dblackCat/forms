<?php namespace Catdesign\Forms\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateFormsTable Migration
 */
class CreateFormsTable extends Migration
{
    public function up()
    {
        Schema::create('catdesign_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('code', 255);
            $table->string('form_classes', 1024)->nullable();
            $table->string('field_classes', 1024)->nullable();
            $table->string('wrapper_classes', 1024)->nullable();
            $table->string('button_classes', 1024)->nullable();
            $table->string('sendpulse_address_list_id', 255)->nullable();
            $table->boolean('is_active')->default(0);
            $table->boolean('is_forward')->default(0);
            $table->boolean('is_not_send')->default(0);
            $table->boolean('is_hide_title')->default(0);
            $table->boolean('is_wrapper')->default(1);
            $table->boolean('is_answer')->default(0);
            $table->boolean('is_sendpulse')->default(0);
            $table->string('forward_email', 1024)->nullable();
            $table->integer('admin_template_id')->unsigned();
            $table->integer('user_template_id')->unsigned()->nullable();
            $table->text('events')->nullable();
            $table->text('description')->nullable();
            $table->string('button_text', 1024)->nullable();
            $table->text('properties')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catdesign_forms');
    }
}
