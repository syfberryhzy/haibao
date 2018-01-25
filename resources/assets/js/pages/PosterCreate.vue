<template>
    <div class="container h-full">
        <div class="poster-create-top">
            <img src="/images/bg.png" width="100%" height="100%">
            <div class="change-upload">
                <img src="/images/upload.png" alt="">
                <p>点击修改图片</p>
            </div>
        </div>
        <div class="poster-create-bottom">
            <a class="belles-lettres" href="/lettres">美文选择</a>
            <textarea name="" id="" cols="30" rows="10" placeholder="请留下你的声音" v-html="contract"></textarea>
            <a href="javascript:;" class="weui-btn weui-btn_primary">生成海报</a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lettre'],
    data() {
        return {
            contract: this.lettre.value
        }
    }
}
</script>

<style>

</style>
