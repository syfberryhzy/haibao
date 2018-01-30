<template>
    <div class="container h-full" style="font-size: 12px">
        <div class="weui-search-bar" id="searchBar">
            <form class="weui-search-bar__form">
                <div class="weui-search-bar__box">
                    <i class="weui-icon-search"></i>
                    <input type="search" class="weui-search-bar__input" placeholder="搜索" required="" v-model="keyword">
                    <a href="javascript:" class="weui-icon-clear"></a>
                </div>
                <label class="weui-search-bar__label">
                    <i class="weui-icon-search"></i>
                    <span>搜索</span>
                </label>
            </form>
            <a href="javascript:" class="weui-search-bar__cancel-btn" @click="keyword = ''">取消</a>
        </div>
        <div class="weui-cells weui-cells_access search_show" id="searchShow">
            <a v-for="(category, index) in categories" :key="index" 
                class="weui-cell weui-cell_access" 
                :href="`/categories/${category.id}`"
                v-if="keyword === '' || category.title.indexOf(keyword) > -1">
                <div class="weui-cell__bd">
                    <p>{{ category.title }}</p>
                </div>
                <div class="weui-cell__ft">
                </div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['attributes'],
    data() {
        return {
            categories: this.attributes,
            keyword: ''
        }
    },
    created() {
        setTimeout(() => {
            weui.searchBar('#searchBar');
        });
    }
}
</script>

<style>

</style>
