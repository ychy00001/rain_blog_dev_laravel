<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Comment;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CommentController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('评论管理');
            $content->description('博客评论管理');

            // 添加面包屑导航 since v1.5.7
            $content->breadcrumb(
                ['text' => '评论管理', 'url' => '/comment'],
                ['text' => '列表']
            );


            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑评论');
            $content->description('编辑评论');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('创建评论');
            $content->description('创建评论');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Comment::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('article_id','文章编号')->sortable();
            $grid->pid('父编号')->sortable();
            $grid->content('内容')->sortable();

            $grid->updated_at('更新时间');
            $grid->release_at('发布时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Comment::class, function (Form $form) {

            //初始化分类数据
            $articles = Article::all()->pluck('title','id');
            $defaultSelect = [0=>"无"];
            $comments = Comment::all()->pluck('content','id')->toArray();
            $comments = array_merge($defaultSelect,$comments);
            foreach ($comments as $key => $comment){
                if(isset($comments['content']) && strlen($comment['content']) > 10){
                    $comments[$key]['content'] = substr($comment['content'],0,10)."...";
                }
            }
            $form->display('id', 'ID');
            $form->select('article_id', '文章')->options($articles)->rules('required', ['required'=> '评论文章不能为空']);
            $form->select('pid', '上一级评论')->config('val',0)->options($comments);
            $form->editor('content', '文章内容')->rules('required', ['required' => '内容不能为空!']);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }
}
