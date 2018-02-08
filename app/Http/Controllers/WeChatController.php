<?php

namespace App\Http\Controllers;

use Log;
use Image;
use EasyWeChat\Kernel\Messages\Image as EImage;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function ($message) {
            if ($message['EventKey'] === 'POSTER_CREATE') {
                $items = [
                    new NewsItem([
                        'title' => '海报制作',
                        'url' => route('openid', ['openid' => $message['FromUserName']])
                    ])
                ];
                return new News($items);
            }
            if ($message['EventKey'] === 'LP001') {
                $result = Cache::remember('lp001', $minutes, function () {
                    $app = app('wechat.official_account');
                    return $app->material->uploadImage(public_path() . '/images/lp001.jpg');
                });
                \Log::info('LP001');
                \Log::info($result);
                return new Image($result['media_id']);
            }
            if ($message['EventKey'] === 'LP002') {
                $result = Cache::remember('lp002', $minutes, function () {
                    $app = app('wechat.official_account');
                    return $app->material->uploadImage(public_path() . '/images/lp002.jpg');
                });
                \Log::info('LP002');
                \Log::info($result);
                return new Image($result['media_id']);
            }
            if ($message['EventKey'] === 'LP003') {
                $result = Cache::remember('lp003', $minutes, function () {
                    $app = app('wechat.official_account');
                    return $app->material->uploadImage(public_path() . '/images/lp003.jpg');
                });
                \Log::info('LP003');
                \Log::info($result);
                return new Image($result['media_id']);
            }

            if ($message['EventKey'] === 'LP004') {
                $result = Cache::remember('lp004', $minutes, function () {
                    $app = app('wechat.official_account');
                    return $app->material->uploadImage(public_path() . '/images/lp004.jpg');
                });
                \Log::info('LP004');
                \Log::info($result);
                return new Image($result['media_id']);
            }

            if ($message['EventKey'] === 'LP005') {
                $result = Cache::remember('lp005', $minutes, function () {
                    $app = app('wechat.official_account');
                    return $app->material->uploadImage(public_path() . '/images/lp005.jpg');
                });
                \Log::info('LP005');
                \Log::info($result);
                return new Image($result['media_id']);
            }

            return '恭喜你成功晋升为本仙女的小可爱，每晚9点，让我们聆听彼此

查看教程、上传照片请点击下方菜单，请不要直接在公众号对话内上传照片哦！
<a href ="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzU0MDUyNDkyNA==&scene=124#wechat_redirect">查看小仙女的往期文章请点我</a>
<a href ="http://mp.weixin.qq.com/s/Mp0SHJ_pppgL_WQbN8_2QQ">上传照片的正确方法请点我</a>';
        });

        return $app->server->serve();
    }

    public function upload(Request $request)
    {
        $app = app('wechat.official_account');
        $stream = $app->media->get($request->serverId);

        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/images/fontend/" . date("Ym", time()) . '/'.date("d", time()).'/';

        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;

        $filename = $stream->save($upload_path);

        // $this->cropSize($upload_path . '/' . $filename);

        return '/' .  $folder_name . $filename;
    }

    public function cropSize($file_path)
    {
        // 先实例化，传参是文件的磁盘物理路径
        $image = Image::make($file_path);

        // 进行大小调整的操作
        $image->resize(375, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->crop(375, 300);

        // 对图片修改后进行保存
        $image->save();
    }

    public function menu()
    {
        $buttons = [
            [
                "type" => 'click',
                'name' => '海报制作',
                'key' => 'POSTER_CREATE'
            ],
            [
                "name" => "上传照片",
                "sub_button" => [
                    [
                        "type" => "click",
                        "name" => "乐趴精选礼物",
                        "key"  => "LP001"
                    ],
                    [
                        "type" => "click",
                        "name" => "天猫乐趴旗舰店",
                        "key"  => "LP002"
                    ],
                    [
                        "type" => "click",
                        "name" => "京东乐趴旗舰店",
                        "key" => "LP003"
                    ],
                    [
                        "type" => "click",
                        "name" => "文健旗舰店",
                        "key" => "LP004"
                    ],
                    [
                        "type" => "click",
                        "name" => "乐趴礼物",
                        "key" => "LP005"
                    ],
                ],
            ],
            [
                "type" => "view",
                "name" => "视频教程",
                "url" => "https://u1940045.jisuwebapp.com/app?_app_id=Gqw4VKcGdz"
            ]
        ];

        $app = app('wechat.official_account');

        $app->menu->create($buttons);
    }
}
