<?php

namespace App\Admin\Controllers;

use App\Models\Article;

use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ArticleController extends Controller
{
    use ModelForm;

    public function __construct()
    {
    }

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('文章管理');
            $content->description('博客文章管理');

            // 添加面包屑导航 since v1.5.7
            $content->breadcrumb(
                ['text' => '文章管理', 'url' => '/article'],
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

            $content->header('编辑文章');
            $content->description('编辑文章');

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

            $content->header('创建文章');
            $content->description('创建文章');

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
        return Admin::grid(Article::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('title','标题')->sortable();
            $grid->category('分类')->class_name()->sortable();
            $grid->order('排序')->sortable();
            $grid->comment_count('评论数')->sortable();

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

        return Admin::form(Article::class, function (Form $form) {
            //初始化分类数据
            $categories = Category::all()->pluck('class_name','id');

            $form->display('id', 'ID');
            $form->text('title', '标题')->rules('required|min:5',['required' => '标题不能为空，并且不能小于5个字符!']);
            $form->text('subtitle', '副标题');
            $form->image('cover', '封面')->placeholder('请选择一张图片...');
            $form->select('category_id', '类型')->options($categories)->rules('required', ['required'=> '类型不能为空']);
            $form->editor('content', '文章内容')->rules('required', ['required' => '内容不能为空!']);
            $form->datetime('release_at', '发布时间')->rules('required', ['required' => '发布时间不能为空!']);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }
}
