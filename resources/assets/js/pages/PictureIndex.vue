<template>
    <div class="container h-full">
        <div class="weui-grids bg-white">
            <a v-for="(category, index) in categories" :key="index" :href="`/categories/${category.id}`" class="weui-grid">
                <div class="weui-grid__icon">
                    <img :src="category.icon" alt="">
                </div>
                <p class="weui-grid__label">
                    {{ category.title }}
                </p>
            </a>
        </div>
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">最新图片<a class="picture-more" href="/pictures/new">更多</a></div>
            <div class="weui-panel__bd gallery">
                <img v-for="(picture, index) in hotpictures" 
                    :key="index" 
                    v-lazy="'/uploads/' + picture.image" 
                    @click="hotChange(index, '/uploads/' + picture.image)" 
                    width="90" height="90">
            </div>
        </div>
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">最热图片<a class="picture-more" href="/pictures/hot">更多</a></div>
            <div class="weui-panel__bd gallery">
                <img v-for="(picture, index) in newpictures" 
                    :key="index" 
                    v-lazy="'/uploads/' + picture.image"  
                    @click="newChange(index, '/uploads/' + picture.image)" 
                    width="90" height="90">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['pictureCategory', 'hotPictures', 'newPictures'],
    data() {
        return {
            categories: this.pictureCategory,
            hotpictures: this.hotPictures.data,
            newpictures: this.newPictures.data,
        }
    },
    methods: {
        newChange(id, img) {
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
                        Cookies.set('picture', this.newpictures[id]);
                        window.location.href = '/user/poster/create'
                    }
                }]
            });
        },
        hotChange(id, img) {
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
                        Cookies.set('picture', this.hotpictures[id]);
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
