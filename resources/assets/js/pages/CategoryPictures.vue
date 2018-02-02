<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">{{title}}</div>
            <div class="weui-panel__bd gallery-list">
                <img v-for="(picture, index) in pictures" 
                    :key="index" 
                    v-lazy="'/uploads/' + picture.value" 
                    @click="change(index, '/uploads/' + picture.value)" 
                    class="haibao-img">
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
            weui.confirm(`<img src="${img}" width="100%">`, {
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
                        Cookies.set('picture', this.pictures[id]);
                        window.location.href = '/user/poster/create'
                    }
                }]
            });
        }
    }
}
</script>

<style>

</style>
