<?php

namespace App\Admin\Controllers;

use App\Models\Template;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Admin\Extensions\CheckRow;
use Illuminate\Http\Request;

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
            $grid->model()->orderby('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->body_image('背景图片')->display(function ($img) {
              $img = preg_match('/http/', $img) ? $img : config('app.url'). '/uploads/' .$img;
              return '<img src="'. $img .'" style="width:180px;height:150px;">';
            });;
            $grid->color('字体颜色')->display(function ($color) {
                return '<span style="color: ' . $color . '">' . $color . '</span>';
            });
            $grid->status('状态')->display(function($status) {
              $text =  $status == 1 ? '开启' : '关闭';
              $color =  $status == 1 ? 'bg-blue' : 'bg-yellow';
              return '<span class="badge '. $color .'">'. $text .'</span>';
            });
            $grid->created_at('创建时间');
            $grid->updated_at('编辑时间');
            $grid->actions(function ($actions) {
                // 添加操作
                $status = Template::find($actions->getKey())->status;
                if ($status == 0) {
                  $actions->append(new CheckRow($actions->getKey(), config('app.url')."/admin/template"));
                }
            });
            $grid->disableExport();
            $grid->filter(function($filter) {
              $filter->disableIdFilter();
            });
            $grid->disableRowSelector();
        });
    }

    public function checkOn(Request $request)
    {
        foreach (Template::where('status', 1)->get() as $template) {
            $template->status = 0;
            $template->save();
        }

        $check = Template::find($request->get('id'));
        $check->status = 1;
        $check->save();
        return $request->get('id');
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
            $form->color('color', '字体颜色')->default('#000');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
