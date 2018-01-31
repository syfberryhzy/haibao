<template>
    <div class="container h-full" id="poster">
        <div class="bg"></div>
        <div class="center" data-html2canvas-ignore="true"></div>
        <div class="top" v-show="poster">
            <div class="poster-create-top">
                <img :src="img" width="100%" height="100%" id="img-top">
                <div class="change-upload" @click="changePicture" data-html2canvas-ignore="true">
                    <img src="/images/upload.png" alt="">
                    <p>点击修改图片</p>
                </div>
            </div>
            <div class="poster-create-bottom">
                <p v-if="title">&nbsp;{{ title }}<a class="belles-lettres" href="javascript:;" @click="changeLettre" data-html2canvas-ignore="true"><img src="/images/edit.png" alt=""></a></p>
                <p v-else>&nbsp;<a class="belles-lettres" href="/lettres" @click="changeLettre" data-html2canvas-ignore="true"><img src="/images/edit.png" alt=""></a></p>
                <textarea contenteditable="true" name="" id="" cols="30" rows="8" placeholder="请留下你的声音" v-model="contract" @change="changContract"></textarea>
                <a href="javascript:;" class="weui-btn weui-btn_primary" data-html2canvas-ignore="true" @click="createImg">生成海报</a>
            </div>
        </div>
        <div class="canvas" v-show="!poster">
            <img src="/images/share.png" class="poster-show-share" @click="share">
        </div>
    </div>
</template>

<script>
import html2canvas from 'html2canvas';
export default {
    props: ['template'],
    data() {
        return {
            img: '/images/bg.png',
            contract: '',
            title: '',
            poster: true,
            styleObject: {
                // backgroundImage: `url('${this.template.body_image}')`,
                backgroundSize: `100% 100%`
            }
        }
    },
    created() {
        let lettre = Cookies.getJSON('lettre'),
            picture = Cookies.getJSON('picture');
        if (typeof picture === 'object') {
            this.img = picture.value;
        } else {
            this.img = picture;
        }
        if (typeof lettre === 'object') {
            this.contract = lettre.value;
            this.title = `${lettre.author} | ${lettre.title}`
        } else {
            this.contract = lettre;
        }
        
    },
    methods: {
        share() {
            weui.alert('请长按图片保存到本地后发送给好友', { title: '分享提示' });
        },
        changContract(e) {
            this.contract = e.target.value;
            this.title = '';
            let lettre = Cookies.getJSON('lettre'), value = '';
            if (typeof lettre === 'object') {
                if (e.target.value === lettre.value) {
                    this.title = `${lettre.author} | ${lettre.title}`
                }
            }

        },
        changeLettre() {
            weui.actionSheet([
                {
                    label: '自己编写',
                    onClick: function () {
                        weui.alert('请在下方编辑器里面输入美文')
                    }
                }, {
                    label: '从美文中选择',
                    onClick: function () {
                        window.location.href = '/lettres'
                    }
                }
            ], [
                {
                    label: '取消',
                    onClick: function () {
                        console.log('取消');
                    }
                }
            ], {
                className: 'custom-classname',
                onClose: function(){
                    console.log('关闭');
                }
            });
        },
        changePicture() {
            weui.actionSheet([
                {
                    label: '自己上传',
                    onClick: function () {
                        wx.chooseImage({
                            count: 1, // 默认9
                            sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                            sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                            success: function (res) {
                                var localId = res.localIds[0];
                                if (window.wxjs_is_wkwebview === true || window.wxjs_is_wkwebview === true) {
                                    wx.getLocalImgData({
                                        localId: localId, // 图片的localID
                                        success: function (res) {
                                            var img = res.localData;
                                            Cookies.set('picture', img);
                                            $('#img-top').attr('src', img);
                                        }
                                    });
                                } else {
                                    Cookies.set('picture', localId);
                                    $('#img-top').attr('src', localId);
                                }
                            }
                        });
                    }
                }, {
                    label: '从美图中选择',
                    onClick: function () {
                        console.log('从美图中选择');
                        window.location.href = '/pictures'
                    }
                }
            ], [
                {
                    label: '取消',
                    onClick: function () {
                        console.log('取消');
                    }
                }
            ], {
                className: 'custom-classname',
                onClose: function(){
                    console.log('关闭');
                }
            });
        },
        createImg() {
            this.img = $('#img-top').attr('src');
            if (this.img === '/images/bg.png') {
                weui.alert('请先选择美图');
                return ;
            }
            if (this.contract === '') {
                weui.alert('请先选择美文');
                return ;
            }
            var loading = weui.loading('海报生成中', {
                className: 'custom-classname'
            });
            html2canvas(document.querySelector("#poster"), {
                imageTimeout: 15000
            }).then(canvas => {
                var img = new Image();
                img.src = canvas.toDataURL();
                this.poster = false;
                loading.hide(function() {
                    console.log('`loading` has been hidden');
                });
                document.querySelector(".canvas").appendChild(canvas)
            });
        },
    }
}
</script>

<style>

</style>
