<template>
    <div id="page-container">
        <layout-header @load-layout-finish="loadLayoutFinish"></layout-header>
        <layout-gallery @load-layout-finish="loadLayoutFinish"></layout-gallery>
        <section id="page">
            <div class="container">
                <div class="row">
                    <keep-alive>
                        <router-view @load-layout-finish="loadLayoutFinish"></router-view>
                    </keep-alive>
                    <layout-sidebar @load-layout-finish="loadLayoutFinish"></layout-sidebar>
                </div>
            </div>
        </section>
        <layout-footer @load-layout-finish="loadLayoutFinish"></layout-footer>
    </div>
</template>
<script>
    import LayoutHeader from './components/layout/LayoutHeaderComponent.vue'
    import LayoutGallery from './components/layout/LayoutGalleryComponent.vue'
    import LayoutFooter from './components/layout/LayoutFooterComponent.vue'
    import LayoutSidebar from './components/layout/LayoutSidebarComponent.vue'

    export default {
        data(){
            return {
                loadLayoutCount : 0,
                loadLayoutTotal : 5,
            }
        },
        components: {
            "layout-header" : LayoutHeader,
            "layout-footer" : LayoutFooter,
            "layout-gallery" : LayoutGallery,
            "layout-sidebar" : LayoutSidebar,
        },
        computed: {},
        methods: {
            loadLayoutFinish:function () {
                this.loadLayoutCount++;
                console.log("总页面布局组件:5 -----> 已加载:"+this.loadLayoutCount);
                if(this.loadLayoutCount === this.loadLayoutTotal){
                    //发送组件加载完成事件
                    if (document.createEventObject) {
                        // IE浏览器支持fireEvent方法
                        let evt = document.createEventObject();
                        document.fireEvent("vue.component.finish", evt)
                    } else {
                        // 其他标准浏览器使用dispatchEvent方法
                        let evt = document.createEvent('CustomEvent');
                        evt.initEvent("vue.component.finish", true, true);
                        document.dispatchEvent(evt);
                    }
                }
            }
        },
        created() {
            this.loadLayoutCount = 0;
        },
        mounted() {
        },
    }
</script>
<style>
    @import "../css/bootstrap.css";
    @import "../css/font-Alike.css";
    @import "../css/font-awesome.min.css";
    /*@import "../css/font-Playfair.css";*/
    @import "../css/lightbox.min.css";
    @import "../css/owl.carousel.min.css";
    @import "../css/reset.css";
    @import "../css/style.css";
    @import "../css/notfound.css";
</style>
