<template>
    <div class="col-lg-8 col-sm-8 column">
                    <article class="post" v-for="(artRecList ,index) in articleRecommendLists">
                        <header>
                            <div class="media">
                                <a v-if="artRecList.cover != undefined" :href="'#/article/' + artRecList.id"><img :src="'upload/'+artRecList.cover" alt="" ></a>
                            </div>
                            <h3>
                                <a :href="'#/article/' + artRecList.id">{{artRecList.title}}</a>
                            </h3>
                            <span>{{artRecList.release_at}} / by <a :href="'#article?id=' + artRecList.id">Rain</a> /
                                <a :href="'#/article/' + artRecList.id">{{artRecList.comment_count}} Comments</a></span>
                        </header>
                        <div class="editor-styles" v-html="artRecList.content"></div>
                        <footer>
                            <div>
                                <a :href="'#/article/' + artRecList.id">Continue Reading...</a>
                            </div>
                            <hr>
                        </footer>
                    </article>
                    <nav id="post-nav">
                        <a href="#/article-list">Older Posts »</a>
                    </nav>
                </div>
</template>

<script>
    export default {
        data(){
            return {
                articleRecommendLists : [],
                ajaxCount : 0,
                ajaxTotal : 1,
            };
        },
        computed: {},

        methods: {
            getArticleRecommendList:function () {
                let that = this;
                axios.get('/api/article/recommend-list')
                    .then(function (response) {
                        that.articleRecommendLists = response.data.data;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        that.loadAjaxFinish();
                        console.log(error);
                    });
            },
            loadAjaxFinish:function () {
                this.ajaxCount++;
                if(this.ajaxCount === this.ajaxTotal){
                    this.$emit('load-layout-finish');
                }
            },

        },
        created() {
            this.ajaxCount = 0;
            this.getArticleRecommendList();
        },
        mounted() {
        }
    }
</script>
