<template>
    <div class="container h-full bg" id="poster" v-show="poster" :style="styleObject">
        <div class="poster-create-top">
            <img :src="img" width="100%" height="100%">
            <div class="change-upload" @click="tips">
                <img src="/images/upload.png" alt="">
                <p>点击修改图片</p>
            </div>
        </div>
        <div class="poster-create-bottom">
            <p>&nbsp;<a class="belles-lettres" href="javascript:;" @click="tips">美文选择</a></p>
            <textarea contenteditable="true" name="" id="" cols="30" rows="6" placeholder="请留下你的声音" v-model="contract"></textarea>
            <a href="javascript:;" class="weui-btn weui-btn_primary" @click="tips" v-show="button">生成海报</a>
        </div>
    </div>
</template>

<script>
import html2canvas from 'html2canvas';
export default {
    props: ['lettre', 'picture', 'template'],
    data() {
        return {
            contract: '',
            img: '/images/bg.png',
            button: true,
            poster: true,
            styleObject: {
                backgroundImage: `url('/images/templete.png')`,
                backgroundSize: `100% 100%`
            }
        }
    },
    methods: {
        tips() {
            weui.confirm('海报制作需要在公众账号中操作', {
                title: '操作提醒',
                buttons: [{
                    label: '再看看',
                    type: 'default',
                    onClick: function(){ console.log('no') }
                }, {
                    label: '马上去',
                    type: 'primary',
                    onClick: function(){ console.log('yes') }
                }]
            });
        }
    }
}
</script>

<style>

</style>
