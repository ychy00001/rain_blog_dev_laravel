<template>
    <footer id="footer-main">
        <div class="container">
            <div class="row">
                <div id="foot-left" class="col-lg-6 col-sm-6">
                    <img src="/custom_resources/img/logo2.png" alt="">
                    <p>京ICP备17029279号 © Copyright 2017-2018</p>
                </div>
                <div id="foot-right" class="col-lg-6 col-sm-6">
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        data(){
            return {
                ajaxCount : 0,
                ajaxTotal : 1,
            };
        },
        methods: {
            loadAjaxFinish:function () {
                this.ajaxCount++;
                if(this.ajaxCount === this.ajaxTotal){
                    this.$emit('load-layout-finish');
                }
            }
        },
        created() {
            this.ajaxCount = 0;
        },
        mounted() {
            this.$emit('load-layout-finish');
        }
    }
</script>
