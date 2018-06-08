<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id')->comment('用户ID');
//            $table->string('name')->comment('用户名');
//            $table->string('email')->unique()->comment('邮箱');
//            $table->string('password')->comment('密码');
//            $table->rememberToken();
//            $table->timestamps();
//        });
//
//        Schema::create('password_resets', function (Blueprint $table) {
//            $table->string('email')->index()->comment('邮箱');
//            $table->string('token')->comment('令牌');
//            $table->timestamp('created_at')->nullable()->comment('创建时间');
//        });

        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('文章id');
            $table->integer('category_id')->nullable()->comment('分类id');
            $table->integer('user_id')->default(0)->comment('用户id');
            $table->string('title',255)->comment('标题名');
            $table->string('subtitle',255)->nullable()->comment('副标题名');
            $table->string('cover',1024)->nullable()->comment('封面图片');
            $table->text('content')->comment('内容');
            $table->integer('order')->default(1)->comment('排序');
            $table->integer('comment_count')->nullable()->comment('评论数');
            $table->timestamp('release_at')->nullable()->comment('发布时间');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('id')->comment('分类id');
            $table->string('class_name',255)->comment('分类名称');
            $table->string('order')->default(1)->comment('排序');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id')->comment('评论id');
            $table->integer('article_id')->comment('文章id');
            $table->integer('pid')->default(null)->nullable()->comment('父id');
            $table->text('content')->comment('评论内容');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('links', function (Blueprint $table) {
            $table->increments('id')->comment('链接id');
            $table->string('domain',100)->comment('链接名称');
            $table->string('url',255)->comment('url');
            $table->integer('order')->default(1)->comment('排序');
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
//        Schema::dropIfExists('users');
//        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('article');
        Schema::dropIfExists('category');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('links');
    }
}
