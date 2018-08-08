<template>
    <div id="page-container">
        <layout-header></layout-header>
        <layout-gallery></layout-gallery>
        <section id="page">
            <div class="container">
                <div class="row">
                    <router-view></router-view>
                    <layout-sidebar></layout-sidebar>
                </div>
            </div>
        </section>
        <layout-footer></layout-footer>
    </div>
</template>
<script>
    import LayoutHeader from './components/layout/LayoutHeaderComponent.vue'
    import LayoutGallery from './components/layout/LayoutGalleryComponent.vue'
    import LayoutFooter from './components/layout/LayoutFooterComponent.vue'
    import LayoutSidebar from './components/layout/LayoutSidebarComponent.vue'

    export default {
        data(){
            return {}
        },
        components: {
            "layout-header" : LayoutHeader,
            "layout-footer" : LayoutFooter,
            "layout-gallery" : LayoutGallery,
            "layout-sidebar" : LayoutSidebar,
        },
        computed: {},
        methods: {

        },
        mounted() {
        },
    }
</script>
<style>
    @import "../css/font-Alike.css";
    @import "../css/font-awesome.min.css";
    @import "../css/font-Playfair.css";
    @import "../css/lightbox.min.css";
    @import "../css/owl.carousel.min.css";
    @import "../css/reset.css";
    @import "../css/style.css";
</style>
