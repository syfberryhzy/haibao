<?php

namespace App\Admin\Controllers;

use App\Models\Template;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TemplateController extends Controller
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

            $content->header('模板管理');
            $content->description('模板页面的设置都在这里哦～');

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

            $content->header('模板管理');
            $content->description('编辑');

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

            $content->header('模板管理');
            $content->description('添加');

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
        return Admin::grid(Template::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->body_image('背景图片')->image();
            $grid->left('左边距');
            $grid->right('右边距');
            $grid->top('上边距');
            $grid->bottom('下边距');
            $grid->color('文本颜色');
            $grid->status('状态');
            $grid->created_at('创建时间');
            $grid->updated_at('编辑时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Template::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->image('body_image', '背景图片');
            $form->text('color', '文本颜色');
            $form->number('left', '左边距')->default(0);
            $form->number('right', '右边距')->default(0);
            $form->number('top', '上边距')->default(0);
            $form->number('bottom', '下边距')->default(0);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
