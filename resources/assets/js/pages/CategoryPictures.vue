<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">最新图片</div>
            <div class="weui-panel__bd gallery-list">
                <img v-for="(picture, index) in pictures" :key="index" :src="picture.value" width="90" height="90">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['categoryPictures'],
    data() {
        return {
            pictures: this.categoryPictures
        }
    }
}
</script>

<style>

</style>
