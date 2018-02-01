<?php

namespace App\Http\Controllers;

use Log;
use EasyWeChat\Kernel\Messages\News;
use EasyWeChat\Kernel\Messages\NewsItem;
use Illuminate\Http\Request;

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

        $filename = $stream->saveAs('/uploads');

        $img = Image::make('/uploads/' . $filename);
        $dataUrl = (string) $img->encode('data-url');
        $img->destroy();

        return $dataUrl;
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
