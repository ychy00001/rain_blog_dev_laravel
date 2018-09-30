<template>
    <div class="col-lg-8 col-sm-8 column">
        <page-loading v-if="ajaxCount != ajaxTotal"></page-loading>
        <div v-else>
            <article class="post" v-for="(artRecList ,index) in articleRecommendLists">
                <header>
                    <div class="media">
                        <a v-if="artRecList.cover != undefined || artRecList.cover != ''" :href="'#/article/' + artRecList.id"><img :src="'upload/'+artRecList.cover" alt="" ></a>
                    </div>
                    <h3>
                        <a :href="'#/article/' + artRecList.id">{{artRecList.title}}</a>
                    </h3>
                    <span>{{artRecList.release_at}} / by <a :href="'#article?id=' + artRecList.id">Rain</a> /
                    <a :href="'#/article/' + artRecList.id">{{artRecList.comment_count}} 评论</a></span>
                </header>
                <div class="editor-styles" v-html="artRecList.content"></div>
                <footer>
                    <div>
                        <a :href="'#/article/' + artRecList.id">内容详情...</a>
                    </div>
                    <hr>
                </footer>
            </article>
            <nav id="post-nav">
                <a href="#/article-list">更多文章 »</a>
            </nav>
        </div>
    </div>
</template>

<script>
    import PageLoading from './widget/LoadingComponent.vue'

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
        watch: {
            '$route' (to, from) {
                if ("index" === to.name) {
                    this.ajaxCount = 0;
                    this.ajaxTotal = 1;
                    this.getArticleRecommendList();
                }
            }
        },
        created() {
            this.ajaxCount = 0;
            this.getArticleRecommendList();
        },
        mounted() {
        },
        components: {
            'PageLoading': PageLoading
        }
    }
</script>
