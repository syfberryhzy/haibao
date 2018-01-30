<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access poster-img">
            <img class="poster-img" v-lazy="'/storage/' + poster.diy_image" alt="">
        </div>
        <img src="/images/share.png" class="poster-show-share" @click="share">
    </div>
</template>

<script>
export default {
    props: ['attributes'],
    data() {
        return {
            poster: this.attributes
        }
    },
    methods: {
        share() {
            weui.alert('请长按图片保存到本地后发送给好友', { title: '分享提示' });
        }
    }
}
</script>

<style>

</style>
