<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名称');
            $table->Tinyinteger('gender')->comment('性别 1=男，2=女')->default(1);
            $table->string('avatar')->comment('头像');
            $table->string('openid')->comment('微信标识')->nullable();
            $table->Tinyinteger('status')->default(0)->comment('关注状态 1=关注');
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
        Schema::dropIfExists('members');
    }
}
