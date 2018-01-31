<?php
namespace App\Admin\Extensions;

use Encore\Admin\Admin;

class CheckRow
{
    protected $id;
    protected $resource;

    public function __construct($id, $resource)
    {
        $this->id = $id;
        $this->resource = $resource;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.grid-check-row').on('click', function () {

    // Your code.
    // console.log($(this).data('id');
    $.ajax({
        method: 'post',
        url: '{$this->resource}/checkon',
        data: {
            _token:LA.token,
            id: $(this).data('id'),
        },
        success: function () {
            $.pjax.reload('#pjax-container');
            toastr.success('操作成功');
        }
    });

});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='btn btn-xs btn-success fa grid-check-row' data-id='{$this->id}'>开启</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
?>
