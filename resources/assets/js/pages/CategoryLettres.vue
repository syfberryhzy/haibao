<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
<<<<<<< HEAD
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
=======
            <div class="weui-panel__hd">{{title}}</div>
            <div class="weui-panel__bd">
                <div v-for="(lettre, index) in lettres" :key="index" class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title" style="line-height: 2.3;">{{ lettre.author }}《{{ lettre.title }}》<a href="javascript:;" @click="change(lettre.id)" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                    <p class="weui-media-box__desc">{{ lettre.value }}</p>
>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049
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
</template>

<script>
export default {
<<<<<<< HEAD

=======
    props: ['categoryLettres', 'title'],
    data() {
        return {
            lettres: this.categoryLettres,
        }
    },
    methods: {
        change(id) {
            weui.confirm('确认选用该美文吗?', {
                title: '操作提示',
                buttons: [{
                    label: '再看看',
                    type: 'default',
                    onClick: () => {
                        console.log('no');
                    }
                }, {
                    label: '确认',
                    type: 'primary',
                    onClick: () => {
                        axios.post(`/lettres/${id}`)
                        .then((response) => {
                            console.log(response.data);
                            weui.toast(response.data.data, {
                                duration: 2000,
                                callback: () => {
                                    window.location.href = '/user/poster/create'
                                }
                            });
                        })
                        .catch((error) => {
                            console.log(error.response.data);
                        })
                    }
                }]
            });
        }
    }
>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049
}
</script>

<style>

</style>
