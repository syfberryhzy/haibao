<?php

namespace App\Http\Controllers;

use Log;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use Illuminate\Http\Request;
use Image;

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
            return "欢迎关注 海报制作公众号";
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
            ]
        ];

        $app = app('wechat.official_account');

        $app->menu->create($buttons);
    }
}
