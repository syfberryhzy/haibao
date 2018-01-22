<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->tinyInteger('gender')->comment('性别 1=男，2=女')->default(1);
            $table->string('avatar')->comment('头像');
            $table->string('openid')->comment('微信标识')->nullable();
            $table->tinyInteger('subscribe')->comment('是否关注 1=关注 0=未关注');
            $table->tinyInteger('status')->default(0)->comment('是否启动 1=启用');
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
        Schema::dropIfExists('users');
    }
}
