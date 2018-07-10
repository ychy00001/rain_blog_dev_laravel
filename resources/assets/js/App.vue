<template>
    <div id="page-container">
        <layout-header></layout-header>
        <layout-gallery></layout-gallery>
        <router-view></router-view>
        <layout-footer></layout-footer>
    </div>
</template>
<script>
    import LayoutHeader from './components/layout/LayoutHeaderComponent.vue'
    import LayoutGallery from './components/layout/LayoutGalleryComponent.vue'
    import LayoutFooter from './components/layout/LayoutFooterComponent.vue'

    export default {
        data(){
            return {}
        },
        components: {
            "layout-header" : LayoutHeader,
            "layout-footer" : LayoutFooter,
            "layout-gallery" : LayoutGallery,
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
    @import "../css/owl.carousel.css";
    @import "../css/reset.css";
    @import "../css/style.css";
</style>
