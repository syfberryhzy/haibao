<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">{{title}}</div>
            <div class="weui-panel__bd gallery-list">
                <img v-for="(picture, index) in pictures" 
                    :key="index" 
                    v-lazy="picture.value" 
                    @click="change(picture.id, picture.value)" 
                    width="90" 
                    height="90">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['categoryPictures', 'title'],
    data() {
        return {
            pictures: this.categoryPictures
        }
    },
    methods: {
        change(id, img) {
            weui.confirm(`<img src="${img}">`, {
                title: '确认选用该美图吗?',
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
                        axios.post(`/pictures/${id}`)
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
