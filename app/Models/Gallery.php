<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Gallery extends Model
{
  public $appends = ['image'];
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
      return $this->attributes['image'] = '/uploads/' . $this->attributes['value'];
    }
}
