<template>
    <div class="container h-full">
        <div class="weui-panel weui-panel_access poster-img">
            <img class="poster-img" :src="'/storage/' + poster.diy_image" alt="">
        </div>
    </div>
</template>

<script>
export default {
    props: ['attributes'],
    data() {
        return {
            poster: this.attributes
        }
    }
}
</script>

<style>

</style>
