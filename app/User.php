<?php

namespace App;

use EasyWeChat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'avatar', 'openid', 'subscribe', 'status'
    ];

    public static function login($openid)
    {
        $officialAccount = EasyWeChat::officialAccount();
        $account = $officialAccount->user->get($openid);
        if (isset($account['errcode']) && $account['errcode'] === 40003) {
            throw new \Exception('不支持的 OpenID');
        }
        $user = self::firstOrNew(['openid' => $openid]);
        if (!$user->exists && $account['subscribe'] === 1) {
            $user->fill([
                'name' => $account['nickname'],
                'gender' => $account['sex'],
                'avatar' => $account['headimgurl'],
                'subscribe' => $account['subscribe']
            ])->save();
        } else {
            $user->update(['subscribe' => 0]);
        }
        return $user;
    }
}
