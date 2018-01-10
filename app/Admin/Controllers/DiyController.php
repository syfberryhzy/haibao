<?php

namespace App\Admin\Controllers;

use App\Models\Diy;
use App\Models\category;
use App\Models\Member;
use App\Models\Template;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DiyController extends Controller
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

            $content->header('DIY海报');
            $content->description('列表展示');

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

            $content->header('DIY海报');
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

            $content->header('DIY海报');
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
        return Admin::grid(Diy::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->member_id('用户');
            $grid->template_id('模板ID');
            $grid->image('图片');
            $grid->post('美文');
            $grid->diy_image('海报');
            $grid->click_num('点击量');
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
        return Admin::form(Diy::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('member_id', '用户');
            $form->text('template_id', '模板');
            $form->image('image', '图片');
            $form->text('post', '美文');
            $form->text('diy_image', '海报');
            $form->number('click_num', '点击量')->default(0);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
