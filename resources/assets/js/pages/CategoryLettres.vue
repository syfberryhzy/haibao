<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">热点好词</div>
            <div class="weui-panel__bd">
                <div v-for="(lettre, index) in lettres" :key="index" class="weui-media-box weui-media-box_text">
                    <h4 class="weui-media-box__title" style="line-height: 2.3;">{{ lettre.author }}《{{ lettre.title }}》<a href="javascript:;" @click="change(lettre.id)" class="weui-btn weui-btn_mini weui-btn_plain-primary" style="float:right">选用</a></h4>
                    <p class="weui-media-box__desc">{{ lettre.value }}</p>
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
    props: ['categoryLettres'],
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
}
</script>

<style>

</style>
