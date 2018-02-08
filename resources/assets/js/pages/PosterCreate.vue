<template>
    <div class="container h-full" id="poster">
        <div class="bg" :style="bg"></div>
        <div class="center" data-html2canvas-ignore="true"></div>
        <div class="top" v-show="poster">
            <div class="poster-create-top" style="height: 80vw;with: 375px;overflow: hidden">
                <img :src="img" :style="templateStyle" id="img-top">
                <div class="change-upload" @click="changePicture" data-html2canvas-ignore="true">
                    <img src="/images/upload.png" alt="">
                    <p>点击修改图片</p>
                </div>
            </div>
            <div class="poster-create-title">
                <p :style="fontColor">&nbsp;{{ title }}</p>
            </div>
            <div class="poster-create-desc">
                <textarea :style="fontColor" 
                    v-focus="focusStatus" 
                    cols="30" rows="8" 
                    v-model="contract" 
                    @change="changContract">
                </textarea>
                <a href="javascript:;" v-if="!edit" class="change-lettre" @click="changeLettre" data-html2canvas-ignore="true">
                    <img src="/images/pan.png" alt="">
                </a>
            </div>
            <div class="poster-create-bottom">
                <a href="javascript:;" class="weui-btn weui-btn_primary" data-html2canvas-ignore="true" @click="createImg">生成海报</a>
            </div>
        </div>
        <div class="canvas" v-show="!poster">
            <img src="/images/share.png" class="poster-show-share" @click="share">
            <img v-if="posterImg" :src="posterImg" class="poster-img" alt="">
        </div>
        <div id="cropper" v-show="cropImg">
            <img id="image" :src="img" width="100%" height="100%">
        </div>
        <a v-show="cropImg" id="crop" class="weui-btn weui-btn_primary" href="javascript:;" @click="crop">裁剪</a>
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
            posterImg: '',
            focusStatus: false,
            bg: {
                backgroundImage: `url(/uploads/${this.template.body_image})`
            },
            fontColor: {
                color: this.template.color
            },
            templateStyle: {
                width: `calc(100vw - ${this.template.left / 37.5}rem - ${this.template.right / 37.5}rem)`,
                height: `calc(80vw - ${this.template.top / 37.5}rem - ${this.template.bottom / 37.5}rem)`
            },
            cropper: '',
            cropImg: true,
            lettre: '',
            picture: '',
            edit: false,
        }
    },
    created() {
        this.cropImg = false;
console.log(window.devicePixelRatio);
        let lettre = localStorage.getItem('lettre'),
            picture = localStorage.getItem('picture');
        
        this.lettre = this.isJSON(lettre) ? JSON.parse(lettre) : lettre;
        this.picture = this.isJSON(picture) ? JSON.parse(picture) : picture;

        if (this.picture !== null && typeof this.picture === 'object') {
            this.img = '/uploads/' + this.picture.value;
        } else if (typeof this.picture === 'string') {
            this.img = this.picture;
        }
        if (this.lettre !== null && typeof this.lettre === 'object') {
            this.contract = this.lettre.value;
            this.title = `${this.lettre.author ? this.lettre.author : ''}  ${this.lettre.title ? this.lettre.title : ''}`
        } else if (typeof this.lettre === 'string') {
            this.contract = this.lettre;
        } else {
            this.contract = this.lettre;
        }
        setTimeout(function () {
            $("textarea").blur();
        })
    },
    methods: {
        isJSON (str) {
            if (typeof str == 'string') {
                try {
                    var obj = JSON.parse(str);
                    if(str.indexOf('{')>-1){
                        return true;
                    }else{
                        return false;
                    }

                } catch(e) {
                    console.log(e);
                    return false;
                }
            }
            return false;
        },
        crop() {
            let dataUrl = this.cropper.getCroppedCanvas().toDataURL();
            $('#img-top').attr('src', dataUrl);
            this.cropImg = false;
            localStorage.setItem('picture', dataUrl);
        },
        share() {
            weui.alert('请长按图片保存到本地后发送给好友', { title: '分享提示' });
        },
        changContract(e) {
            this.contract = e.target.value;
            this.title = '';
            let lettre = this.lettre, value = '';

            if (lettre !== null && typeof lettre === 'object') {
                if (e.target.value === lettre.value) {
                    this.title = `${lettre.author ? lettre.author : ''} | ${lettre.title ? lettre.title : ''}`
                }
            }

            this.edit = false;

        },
        changeLettre() {
            var that = this;
            weui.actionSheet([
                {
                    label: '自己编写',
                    onClick: function () {
                        that.edit = true;
                        $("textarea").focus();
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
            let that = this;
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
                                wx.uploadImage({
                                    localId: localId, // 需要上传的图片的本地ID，由chooseImage接口获得
                                    isShowProgressTips: 1, // 默认为1，显示进度提示
                                    success: function (res) {
                                        var serverId = res.serverId; // 返回图片的服务器端ID
                                        axios.post('/wechat/upload', {
                                            serverId: serverId
                                        }).then(response => {
                                            var img = response.data;
                                            that.img = img;
                                            $('#image').attr('src', img);
                                            that.cropImg = true;
                                            var image = document.getElementById('image');
                                            if (typeof that.cropper === 'string') {     
                                                that.cropper = new Cropper(image, {
                                                    aspectRatio: (375 - that.template.left - that.template.right) / (300 - that.template.top - that.template.bottom),
                                                    crop: function(e) {
                                                    }
                                                });
                                            }
                                        })
                                    }
                                });
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
            var lettre = this.lettre;
           
            if (lettre !== null && typeof lettre === 'object') {
                let contract = lettre.value;
                if (contract !== this.contract) {
                    localStorage.setItem('lettre', this.contract);
                }
            } else if (typeof lettre === 'string') {
                localStorage.setItem('lettre', this.contract);
            }
            html2canvas(document.querySelector("#poster"), {
                imageTimeout: 15000,
		scale: 6
            }).then(canvas => {
                var img = new Image();
                img.src = canvas.toDataURL();
                this.poster = false;
                loading.hide(function() {
                    console.log('`loading` has been hidden');
                });
                this.posterImg = img.src;
                // document.querySelector(".canvas").appendChild(canvas)
            });
        },
    }
}
</script>

<style>

</style>
