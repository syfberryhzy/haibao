<?php

namespace App\Models;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use App\Models\Paragraph;

class Category extends Model
{
    use ModelTree, AdminBuilder;

    const MEIWEN_PID = 1;
    const TUPIAN_PID = 2;
    const TUPIAN_BY_USER_ID = 3;//用户上传id

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
      parent::__construct($attributes);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

    public function paragraphs()
    {
      return $this->hasMany(Paragraph::class);
    }

    public function lettres()
    {
        return $this->hasMany(Paragraph::class, 'category_id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    /**
     * 获取该分类的下级分类列表
     */
    public function getChildrenCategory()
    {
        return $this->childrenCategory()->get();
    }

    /**
     * 判断该分类下是否有分类
     */
    public function isHasChildrenCategory()
    {
        return $this->childrenCategory()->exists();
    }

    /**
     * 判断是否是美文分类下的
     */
    public function isLettreCategory()
    {
        return $this->parent_id === self::MEIWEN_PID;
    }

    /**
     * 判断是否是图片分类下的
     */
    public function isPictureCategory()
    {
        return $this->parent_id === self::TUPIAN_PID;
    }
}
