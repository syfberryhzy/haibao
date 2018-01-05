<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
海报制作
上传图片
图片库搜索--分类

撰写文字
美文搜索--分类（歌词，电影台词，名人名言，搞笑段子，小清新，名著美文，小说精选，二次元）

问题：
1.多个父子级分类，前端如何展示搜索
2.文字排版效果（居中，断行，换行等），如何制作

分类表：
单图片
admin_pic
id, name, click_num 点击数, use_num 使用数, cate_id 分类id, value 图片字段
word
id, name, click_num 点击数, use_num 使用数, cate_id 分类id, value 文本字段, 作品名，作家名,

user用户
id, open_id, nickname, gender, ....
用户相册user_pic：
id, user_id,
diy制作表
id, user_id, pic, content,成果图片

设置表：
图片选取尺寸，纵横尺寸，水印字样

最新 时间排序
最热 点击量排序
