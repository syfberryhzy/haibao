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
            $table->string('color')->default('#fff')->comment('文本颜色 #十六进制');
            $table->Integer('left')->default(0)->comment('左边距');
            $table->Integer('right')->default(0)->comment('右边距');
            $table->Integer('top')->default(0)->comment('上边距');
            $table->Integer('bottom')->default(0)->comment('下边距');
            $table->TinyInteger('status')->default(0)->comment('状态 1=使用，0=禁用');
            // $table->string('ewm')->comment('预览二维码');
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
