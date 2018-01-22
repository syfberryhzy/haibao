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
        <div class="weui-panel__hd">热点好词</div>
        <div class="weui-panel__bd">
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title" style="line-height: 2.3;">蔡健雅《红色高跟鞋》<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                <p class="weui-media-box__desc">该怎么去形容你最贴切，那什么跟你作比较才算特别，对你的感觉强烈却又不太了解。</p>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title" style="line-height: 2.3;">陈鸿宇《理想三旬》<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                <p class="weui-media-box__desc">雨后有车驶来，驶过暮色苍白，旧铁皮往南开，恋人已不在，收听浓烟下的诗歌电台。</p>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title" style="line-height: 2.3;">陈鸿宇《理想三旬》<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                <p class="weui-media-box__desc">雨后有车驶来，驶过暮色苍白，旧铁皮往南开，恋人已不在，收听浓烟下的诗歌电台。</p>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title" style="line-height: 2.3;">陈鸿宇《理想三旬》<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                <p class="weui-media-box__desc">雨后有车驶来，驶过暮色苍白，旧铁皮往南开，恋人已不在，收听浓烟下的诗歌电台。</p>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title" style="line-height: 2.3;">陈鸿宇《理想三旬》<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                <p class="weui-media-box__desc">雨后有车驶来，驶过暮色苍白，旧铁皮往南开，恋人已不在，收听浓烟下的诗歌电台。</p>
            </div>
        </div>
        <div class="weui-panel__ft">
            <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                <div class="weui-cell__bd">查看更多</div>
                <span class="weui-cell__ft"></span>
            </a>    
        </div>
    </div>
</div>
@endsection
