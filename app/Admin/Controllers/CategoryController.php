<?php

namespace App\Admin\Controllers;

use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Tree;

class CategoryController extends Controller
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

            $content->header('分类管理');
            $content->description('所有分类都在这里哦～');
            $content->body(Category::tree(function ($tree) {
                $tree->branch(function ($branch) {
                    $src = config('admin.upload.host') . '/' . $branch['icon'] ;
                    $logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

                    return "{$branch['id']} - $logo - {$branch['title']}";
                });
            }));
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

            $content->header('分类管理');
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

            $content->header('分类管理');
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
        return Admin::grid(Category::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Category::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '标题')->rules('required|min:2');
            $form->image('icon', '图标')->rules('required');
            $form->select('parent_id', '父级')->options(Category::where('parent_id', 0)->get()->pluck('title', 'id'))->default(1);
            $form->number('order', '排序')->default(0);
            $states = [
              'on' => ['value' => '1', 'text' => '可用',  'color' => 'success'],
              'off' => ['value' => '0', 'text' => '禁用', 'color' => 'danger']
            ];
            $form->switch('status', '状态')->states($states)->default(1);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
