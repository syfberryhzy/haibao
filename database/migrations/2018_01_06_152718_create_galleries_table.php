<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('图片名');
            $table->string('description')->comment('简述');
            $table->unsignedInteger('category_id');
            $table->string('value')->comment('图片');
            $table->Integer('click_num')->default(0)->comment('点击数');
            $table->Integer('use_num')->default(0)->comment('使用数');
            $table->Tinyinteger('status')->comment('状态 默认可用 1=可用，0=禁用')->default('1');
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
        Schema::dropIfExists('galleries');
    }
}
