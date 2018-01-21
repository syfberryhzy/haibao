<?php

namespace App\Admin\Controllers;

use App\Models\Gallery;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GalleryController extends Controller
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

            $content->header('图片库');
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

            $content->header('图片库');
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

            $content->header('图片库');
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
        return Admin::grid(Gallery::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->category_id('分类编号');
            $grid->title('名称');
            // $grid->value('图片')->image();
            $grid->value('图片')->display(function ($img) {
              return '<img src="'. $img .'" style="width:180px;height:150px;">';
            });
            $grid->description('简述');
            $grid->click_num('点击量');
            $grid->use_num('使用量');
            $grid->status('状态');
            $grid->created_at('创建时间');
            // $grid->updated_at('编辑时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Gallery::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('category_id', '分类')->options(Category::where('parent_id', Category::TUPIAN_PID)->get()->pluck('title', 'id'));
            $form->text('title', '名称');
            $form->image('value', '图片');
            $form->textarea('description', '简述');
            $form->number('click_num', '点击量')->default(0);
            $form->number('use_num', '使用量')->default(0);
            $states = [
              'on' => ['value' => '1', 'text' => '可用', 'color' => 'success'],
              'off' => ['value' => '0', 'text' => '禁用', 'color' => 'danger']
            ];
            $form->switch('status', '状态')->states($states)->default(1);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
