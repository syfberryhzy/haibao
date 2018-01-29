<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">我的作品</div>
            <div class="weui-panel__bd">
                <div v-for="(poster, index) in posters" :key="index" 
                    class="weui-media-box weui-media-box_appmsg"
                    @click="detail(poster.id)">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" :src="typeof poster.image === 'string' ? poster.image : poster.image.value" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title" style="line-height: 2.3;" v-if="typeof poster.post !== 'string'">{{ poster.post.author }} 《{{ poster.post.title }}》</h4>
                        <h4 class="weui-media-box__title" style="line-height: 2.3;" v-else>{{ user.name }}</h4>
                        <p class="weui-media-box__desc">{{ typeof poster.post === 'string' ? poster.post : poster.post.value }}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="weui-panel__ft">
                <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
                    <div class="weui-cell__bd">查看更多</div>
                    <span class="weui-cell__ft"></span>
                </a>    
            </div> -->
        </div>
    </div>
</template>

<script>
export default {
    props: ['attributes'],
    data() {
        return {
            posters: this.attributes,
            user: window.App.user
        }
    },
    methods: {
        detail(id) {
            window.location.href = `/user/poster/${id}`;
        }
    }
}
</script>

<style>

</style>
