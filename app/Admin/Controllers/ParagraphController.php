<?php

namespace App\Admin\Controllers;

use App\Models\Paragraph;
use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ParagraphController extends Controller
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

            $content->header('美文库');
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

            $content->header('美文库');
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

            $content->header('美文库');
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
        return Admin::grid(Paragraph::class, function (Grid $grid) {
            $grid->model()->orderby('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->column('category.title', '分类名称')->badge('green');
            $grid->title('来源（作品名）')->display(function($title) {
              return '<strong><i>'. $title .'</i></strong>';
            })->badge('yellow');
            $grid->author('作者')->badge('blue');
            $grid->value('内容')->display(function ($str) {
              return '<div style="width:300px;height:130px;">'. $str .'</div>';
            });
            $grid->click_num('数据信息')->display(function($click_num) {
              return '点击量: '.$this->click_num.'<br/>'.'使用量: '.$this->use_num;
            });
            $states = [
              ['text' => '启用', 'value' => '1', 'color' => 'success'],
              ['text' => '禁用', 'value' => '０', 'color' => 'danger']
            ];
            $grid->status('状态')->switch($states);
            $grid->created_at('创建时间');
            $grid->disableExport();
            $grid->filter(function ($filter) {
              $filter->disableIdFilter();
              $filter->where(function($query) {
                $query->where('title', 'like', "%{$this->input}%")
                ->orWhere('author', 'like', "%{$this->input}%")
                ->orWhere('value', 'like', "%{$this->input}%");
              }, '来源（作品名）或作者或内容');
              $filter->where(function ($query) {
                  $query->whereHas('category', function ($query) {
                      $query->where('title', 'like', "%{$this->input}%");
                  });
              }, '分类名称')->select(Category::buildSelectOptions($nodes = [], $parentId = Category::MEIWEN_PID, $prefix = ''));
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Paragraph::class, function (Form $form) {

            $form->display('id', 'ID');
            // $form->select('category_id', '分类')->options(Category::where('parent_id', Category::MEIWEN_PID)->selectOptions());
            $form->select('category_id', '分类')->options(Category::buildSelectOptions($nodes = [], $parentId = Category::MEIWEN_PID, $prefix = ''));
            $form->text('title', '作品名');
            $form->text('author', '作者');
            $form->textarea('value', '内容');
            $form->number('click_num', '点击量')->default(0);
            $form->number('use_num', '使用量')->default(0);
            $states = [
              ['text' => '启用', 'value' => '1', 'color' => 'success'],
              ['text' => '禁用', 'value' => '０', 'color' => 'danger']
            ];
            $form->switch('status', '状态')->states($states)->default(1);
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '编辑时间');
        });
    }
}
