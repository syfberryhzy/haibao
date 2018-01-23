@extends('layouts.app')

@section('content')
<div class="container h-full">
    <div class="weui-grids bg-white">
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/singer.png" alt="">
            </div>
            <p class="weui-grid__label">
                歌词歌单
            </p>
        </a>
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/comic.png" alt="">
            </div>
            <p class="weui-grid__label">
                影视动漫
            </p>
        </a>
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/other.png" alt="">
            </div>
            <p class="weui-grid__label">
                其他美文
            </p>
        </a>
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/literature.png" alt="">
            </div>
            <p class="weui-grid__label">
                文学著作
            </p>
        </a>
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/motto.png" alt="">
            </div>
            <p class="weui-grid__label">
                名人名言
            </p>
        </a>
        <a href="javascript:;" class="weui-grid">
            <div class="weui-grid__icon">
                <img src="/images/movie.png" alt="">
            </div>
            <p class="weui-grid__label">
                电影台词
            </p>
        </a>
    </div>
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">最新图片<a class="picture-more" href="">更多</a></div>
        <div class="weui-panel__bd">
            
        </div>
    </div>
    <div class="weui-panel weui-panel_access">
        <div class="weui-panel__hd">最热图片<a class="picture-more" href="">更多</a></div>
        <div class="weui-panel__bd">
            
        </div>
    </div>
</div>
@endsection
