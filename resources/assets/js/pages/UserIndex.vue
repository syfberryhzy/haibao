<template>
    <div class="container">
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__hd" style="position: relative;margin-right: 10px;">
                    <img :src="user.avatar" style="width: 50px;display: block">
                </div>
                <div class="weui-cell__bd">
                    <p>{{user.name}}</p>
                    <p style="font-size: 13px;color: #888888;">暂无信息</p>
                </div>
            </div>
        </div>
        <div class="weui-cells">
            <a v-for="(menu, index) in menus" :key="index" :href="menu.url" class="weui-cell weui-cell_access">
                <div class="weui-cell__hd">
                    <img :src="menu.icon" alt="" style="width:20px;margin-right:5px;display:block">
                </div>
                <div class="weui-cell__bd">
                    <p>{{menu.name}}</p>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: [],
    data() {
        return {
            user: window.App.user,
            menus: [
                {
                    icon: '/images/me.png',
                    name: '我的海报',
                    url: '/user/poster'
                },
                {
                    icon: '/images/work.png',
                    name: '海报制作',
                    url: '/user/poster/create'
                }
            ]
        }
    }
}
</script>

<style>

</style>

