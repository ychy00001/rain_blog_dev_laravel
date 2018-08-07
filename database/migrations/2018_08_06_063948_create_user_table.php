<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->comment('用户id');
            $table->string('nickname',255)->comment('昵称');
            $table->string('avatar',255)->nullable()->comment('头像');
            $table->string('email',255)->nullable()->comment('邮箱');
            $table->string('remember_token',100)->nullable()->comment('记住我');
            $table->string('password',255)->nullable()->comment('密码');
            $table->integer('mobile')->nullable()->comment('手机号');
            $table->string('open_id',255)->nullable()->comment('open_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
