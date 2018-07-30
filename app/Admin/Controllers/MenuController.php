<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class MenuController extends Controller
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

            $content->header('菜单管理');
            $content->description('博客菜单管理');

            // 添加面包屑导航 since v1.5.7
            $content->breadcrumb(
                ['text' => '菜单管理', 'url' => '/menu'],
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

            $content->header('编辑菜单');
            $content->description('编辑菜单');

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

            $content->header('创建菜单');
            $content->description('创建菜单');

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
        return Admin::grid(Menu::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name', '名称')->sortable();
            $grid->column('url', '跳转路径')->sortable();
            $grid->column('pid', '上级菜单名称')->sortable();
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
        return Admin::form(Menu::class, function (Form $form) {
            //初始化分类数据
            $menus = (new Menu())->where('pid', 0)->get()->pluck('name', 'id')->toArray();
            array_unshift($menus, "无");
            $form->display('id', 'ID');
            $form->text('name', '名称')->rules('required|max:10', ['required' => '内容不能为空!', 'max' => '名称不能超过10个字符!']);
            $form->text('url', '跳转路径')->rules('required', ['required' => '内容不能为空!']);
            $form->select('pid', '父菜单')->rules('required', ['required' => '父菜单不能为空!'])->options($menus);
            $form->text('order', '排序')->default(1)->rules('min:1|max:99');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '修改时间');
        });
    }
}
