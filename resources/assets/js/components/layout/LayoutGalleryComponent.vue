<template>
    <section id="section-featured" class="clearfix">
        <div id="prev-owl">
            <i class="fa fa-chevron-left"></i>
        </div>
        <div id="next-owl">
            <i class="fa fa-chevron-right"></i>
        </div>


        <div id="featured" class="owl-carousel owl-theme">
            <div class="item" v-for="(bannerList,index) in bannerLists">
                <div>
                    <a :href="bannerList.url"><img :src="'upload/'+bannerList.poster" alt=""></a>
                    <span>{{bannerList.name}}</span>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return {
                bannerLists : [],
                ajaxCount : 0,
                ajaxTotal : 1,
            };
        },
        computed: {},

        methods: {
            getBannerList:function () {
                let that = this;
                axios.get('/api/banner/list')
                    .then(function (response) {
                        that.bannerLists = response.data.data;
                        that.$nextTick(function(){
                            if (document.createEventObject) {
                                // IE浏览器支持fireEvent方法
                                let evt = document.createEventObject();
                                console.log("Banner数据加载完成!发送IE js事件");
                                document.fireEvent("vue.banner.finish", evt)
                            } else {
                                // 其他标准浏览器使用dispatchEvent方法
                                let evt = document.createEvent('CustomEvent');
                                evt.initEvent("vue.banner.finish", true, true);
                                console.log("Banner数据加载完成!发送Chrome js事件");
                                document.dispatchEvent(evt);
                            }

                        });
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
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
            this.getBannerList();
        }
    }
</script>
