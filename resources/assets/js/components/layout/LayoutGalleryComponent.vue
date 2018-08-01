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
                bannerLists : []
            };
        },
        computed: {},

        methods: {
            getBannerList:function () {
                let that = this;
                axios.get('/api/banner/list')
                    .then(function (response) {
                        console.log(response);
                        that.bannerLists = response.data.data;
                        that.$nextTick(function(){
                            console.log("动态数据渲染完毕!");
                            let event = document.createEvent("CustomEvent");
                            event.initCustomEvent("vue.banner.finish",true,true);
                            document.dispatchEvent(event);
                        })
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            console.log('轮播图页面创建!.')
        },
        mounted() {
            this.getBannerList();
            console.log('轮播图页面挂载!.')
        }
    }
</script>
