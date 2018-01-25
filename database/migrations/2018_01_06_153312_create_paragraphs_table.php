<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('title')->comment('美文名');
            $table->string('author')->comment('作者');
            // $table->string('contract')->comment('来源（书名）');
            $table->text('value')->comment('美文');
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
        Schema::dropIfExists('paragraphs');
    }
}
