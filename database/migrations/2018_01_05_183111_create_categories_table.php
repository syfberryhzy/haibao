<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('分类名称')->unique();
            $table->string('icon')->nullable()->comment('icon');
            $table->integer('parent_id')->comment('父级id')->default(0);
            $table->integer('order')->default(0)->comment('排序 默认为0');
            $table->tinyInteger('status')->comment('状态 默认可用 1=可用，0=禁用')->default('1');
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
        Schema::dropIfExists('categories');
    }
}
