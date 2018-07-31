<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class BannerController extends Controller
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

            $content->header('Banner管理');
            $content->description('博客Banner管理');

            // 添加面包屑导航 since v1.5.7
            $content->breadcrumb(
                ['text' => 'Banner管理', 'url' => '/banner'],
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

            $content->header('编辑Banner');
            $content->description('编辑Banner');

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

            $content->header('创建Banner');
            $content->description('创建Banner');

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
        return Admin::grid(Banner::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '名称')->sortable();
            $grid->column('url', '跳转路径')->sortable();
            $grid->column('intro', '简介')->sortable();
            $grid->column('poster', '海报')->sortable();
            $grid->order('排序')->sortable();

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
        return Admin::form(Banner::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '名称')->rules('required|max:10', ['required' => '标题不能为空!', 'max' => '名称不能超过10个字符!']);
            $form->text('intro', '简介')->rules('required|max:200', ['required' => '内容不能为空!', 'max' => '名称不能超过200个字符!']);
            $form->text('url', '跳转路径')->rules('required', ['required' => '跳转路径不能为空!']);
            $form->image('poster', '海报')->placeholder('请选择一张图片...');
            $form->text('sort', '排序')->default(1)->rules('min:1|max:99');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }
}
