<template>
    <div class="col-lg-8 col-sm-8 column not_found">
        <div class="wrap">
            <div class="logo">
                <img src="/custom_resources/img/404.png" alt="404页面"  />
                <p><a href="#/index">返回首页</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {

            };
        },
        computed: {},

        methods: {
        },
        created() {

        },
        mounted() {
            this.$emit('load-layout-finish');
        },
        components: {
        }
    }
</script>
