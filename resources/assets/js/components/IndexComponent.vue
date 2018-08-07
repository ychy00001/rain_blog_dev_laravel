<template>
    <section id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 column">
                    <article class="post" v-for="(artRecList ,index) in articleRecommendLists">
                        <header>
                            <div class="media">
                                <a :href="'#/article?id=' + artRecList.id"><img :src="'upload/'+artRecList.cover" alt=""></a>
                            </div>
                            <h3>
                                <a :href="'#/article?id=' + artRecList.id">{{artRecList.title}}</a>
                            </h3>
                            <span>December 22, 2014 / by <a :href="'#article?id=' + artRecList.id">Rain</a> /
                                <a :href="'#/article?id=' + artRecList.id">{{artRecList.comment_count}} Comments</a></span>
                        </header>
                        <div class="editor-styles" v-html="artRecList.content"></div>
                        <footer>
                            <div>
                                <a :href="'#/article?id=' + artRecList.id">Continue Reading...</a>
                            </div>
                            <hr>
                        </footer>
                    </article>
                    <nav id="post-nav">
                        <a href="#/article-list">Older Posts »</a>
                    </nav>
                </div>
                <div class="col-lg-4 col-sm-4 column space">
                    <aside id="sidebar">
                        <div class="widget">
                            <div class="search-form clearfix">
                                <input type="text" name="s" placeholder="Search...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="widget">
                            <h4>About</h4>
                            <p> 我是一只程序员！</p>
                        </div>
                        <div class="widget">
                            <h4>Find me on</h4>
                            <p>WeChat：ychy0001</p>
                            <p>E-mail①：ychy0001@gmail.com</p>
                            <p>E-mail②：ychy0001@163.com</p>
                        </div>
                        <div class="widget">
                            <h4>Latest Posts</h4>
                            <ul>
                                <li v-for="(artLatest ,index) in articleLatestLists"><a :href="'#/article?id=' + artLatest.id">{{artLatest.title}}</a></li>
                            </ul>
                        </div>
                        <div class="widget tagcloud">
                            <h4>Categories</h4>
                            <ul>
                                <li v-for="(category ,index) in categoryLists"><a :href="'#/article-list?category_id=' + category.id">{{category.class_name}}({{category.article_num}})</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return {
                articleRecommendLists : [],
                articleLatestLists : [],
                categoryLists : [],
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
            getArticleLatestList:function () {
                let that = this;
                axios.get('/api/article/latest-list')
                    .then(function (response) {
                        that.articleLatestLists = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getCategoryList:function () {
                let that = this;
                axios.get('/api/category/list')
                    .then(function (response) {
                        that.categoryLists = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getArticleRecommendList();
            this.getArticleLatestList();
            this.getCategoryList();
            console.log('index页面创建!.')
        },
        mounted() {
            console.log('index页面挂载!.')
        }
    }
</script>
