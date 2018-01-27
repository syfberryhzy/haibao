<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

class Category extends Model
{
    use ModelTree, AdminBuilder;

    const TUPIAN_PID = 1;
    const MEIWEN_PID = 2;
    const TUPIAN_BY_USER_ID = 3;//用户上传id

    public function __construct(array $attributes = [])
    {
      parent::__construct($attributes);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

    public function lettres()
    {
        return $this->hasMany(Paragraph::class, 'category_id');
    }
}
