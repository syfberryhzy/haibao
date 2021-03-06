<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body_image')->comment('背景图片');
            $table->integer('top')->comment('上边距');
            $table->integer('left')->comment('左边距');
            $table->integer('bottom')->comment('下边距');
            $table->integer('right')->comment('右边距');
            $table->string('color')->default("#000");
            $table->tinyInteger('status')->default(0)->comment('状态 1=使用，0=禁用');
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
        Schema::dropIfExists('templates');
    }
}
