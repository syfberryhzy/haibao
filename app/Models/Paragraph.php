<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Paragraph extends Model
{
    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
