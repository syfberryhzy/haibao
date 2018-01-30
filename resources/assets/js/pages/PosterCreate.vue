<template>
    <div class="container h-full bg" id="poster" v-show="poster" :style="styleObject">
        <div class="poster-create-top">
            <img :src="img" width="100%" height="100%">
            <div class="change-upload" @click="changePicture" data-html2canvas-ignore="true">
                <img src="/images/upload.png" alt="">
                <p>点击修改图片</p>
            </div>
        </div>
        <div class="poster-create-bottom">
            <p v-if="this.lettre">&nbsp;{{ this.lettre.author }} | {{ this.lettre.title }}<a class="belles-lettres" href="/lettres" data-html2canvas-ignore="true">美文选择</a></p>
            <p v-else>&nbsp;<a class="belles-lettres" href="/lettres" data-html2canvas-ignore="true">美文选择</a></p>
            <textarea contenteditable="true" name="" id="" cols="30" rows="6" placeholder="请留下你的声音" v-model="contract"></textarea>
            <a href="javascript:;" class="weui-btn weui-btn_primary" data-html2canvas-ignore="true" @click="createImg" v-show="button">生成海报</a>
        </div>
    </div>
</template>

<script>
import html2canvas from 'html2canvas';
export default {
    props: ['lettre', 'picture', 'template'],
    data() {
        return {
            contract: this.lettre ? this.lettre.value : '',
            img: this.picture ? this.picture.value : '/images/bg.png',
            button: true,
            poster: true,
            styleObject: {
                backgroundImage: `url('${this.template.body_image}')`,
                backgroundSize: `100% 100%`
            }
        }
    },
    methods: {
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
                                console.info('localId: ', localId);
                                wx.getLocalImgData({
                                    localId: localId, // 图片的localID
                                    success: function (res) {
                                        var dataurl = res.localData; // localData是图片的base64数据，可以用img标签显示
                                        console.info('dataurl: ', dataurl);
                                        var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
                                        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                                        while(n--){
                                            u8arr[n] = bstr.charCodeAt(n);
                                        }
                                        var image = new Blob([u8arr], {type:mime});
                                        var data = new FormData();
                                        let that = this;
                                        data.append('file', image);
                                        axios.post(`/upload`, data)
                                            .then(response => {
                                                console.info('response: ', response);
                                                if (response.status == 201) {
                                                    this.img = response.data;
                                                }
                                            });
                                    }
                                });
                            }
                        });
                    }
                }, {
                    label: '从美图选择',
                    onClick: function () {
                        console.log('从美图选择');
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
            if (this.img === '/images/bg.png') {
                weui.alert('请先选择美图');
                return ;
            }
            if (this.contract === '') {
                weui.alert('请先选择美文');
                return ;
            }
            html2canvas(document.querySelector("#poster"), {
                logging: false,
                useCORS: true,
                allowTaint: false,
                letterRendering: true,
            }).then(canvas => {
                var img = new Image();
                img.src = canvas.toDataURL();
                this.persist(img.src)
                
                document.querySelector("#app").appendChild(canvas)
            });
        },
        persist(dataurl) {
            var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
            while(n--){
                u8arr[n] = bstr.charCodeAt(n);
            }
            var image = new Blob([u8arr], {type:mime});
            var data = new FormData();
            let that = this;
            data.append('file', image);
            data.append('template_id', this.template.id);
            data.append('contract', this.contract);
            data.append('img', this.img);
            axios.post(`/user/poster`, data)
                .then(response => {
                    if (response.status == 201) {
                            weui.toast('生成海报成功', {
                            duration: 2000,
                            callback: () => {
                                window.location.href = `/user/poster/${response.data.data.id}`
                            }
                        });
                    }
                });
        },
    }
}
</script>

<style>

</style>
