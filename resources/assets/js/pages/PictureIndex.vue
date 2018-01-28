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
                <img v-for="(picture, index) in hotpictures" :key="index" :src="picture.value" width="90" height="90">
            </div>
        </div>
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">最热图片<a class="picture-more" href="/pictures/hot">更多</a></div>
            <div class="weui-panel__bd gallery">
                <img v-for="(picture, index) in newpictures" :key="index" :src="picture.value"  width="90" height="90">
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
}
</script>

<style>

</style>
