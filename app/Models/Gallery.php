<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class Gallery extends Model
{
    // protected static function boot()
    // {
    //     static::bootTraits();
    //     static::created(function ($query) {
    //       $query->otherImage();
    //     });
    // }
    /*
    *上传其余图片
    */
    function otherImage()
    {
      $images = Cache::pull('images');
      if($images　&& count($images) > 0) {
        $data = [
          'category_id' => $this->category_id,
          'created_at' => $this->created_at,
          'title' => $this->title,
          'description' => $this->description,
          'status' => $this->status
        ];
        foreach($images as $val) {
          $data['value'] = $val;
          $datas[] = $data;
        }
        \DB::table('galleries')->insert($datas);
      }
    }

    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function setValueAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['value'] = $value[0];
            unset($value[0]);
            if (count($value) > 0) {
              $expiresAt = Carbon::now()->addMinutes(15);
              Cache::put('images', $value, $expiresAt);

            }
        }

    }

    public function getValueAttribute($value)
    {
        // return json_decode($pictures, true);
        return $value;
    }
}
