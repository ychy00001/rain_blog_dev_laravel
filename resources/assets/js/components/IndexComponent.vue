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
            };
        },
        computed: {},

        methods: {
            getArticleRecommendList:function () {
                let that = this;
                axios.get('/api/article/recommend-list')
                    .then(function (response) {
                        that.articleRecommendLists = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

        },
        created() {
            this.getArticleRecommendList();
            console.log('index页面创建!.')
        },
        mounted() {
            console.log('index页面挂载!.')
        }
    }
</script>
