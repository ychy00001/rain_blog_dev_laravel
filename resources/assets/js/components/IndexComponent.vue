<template>
    <section id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 column">
                    <article class="post" v-for="(artRecList ,index) in articleRecommendLists">
                        <header>
                            <div class="media">
                                <a :href="'#article?id=' + artRecList.id"><img :src="'upload/'+artRecList.cover" alt=""></a>
                            </div>
                            <h3>
                                <a :href="'#article?id=' + artRecList.id">{{artRecList.title}}</a>
                            </h3>
                            <span>December 22, 2014 / by <a :href="'#article?id=' + artRecList.id">Rain</a> /
                                <a :href="'#article?id=' + artRecList.id">{{artRecList.comment_count}} Comments</a></span>
                        </header>
                        <div class="editor-styles" v-html="artRecList.content"></div>
                        <footer>
                            <div>
                                <a :href="'#article?id=' + artRecList.id">Continue Reading...</a>
                            </div>
                            <hr>
                        </footer>
                    </article>
                    <nav id="post-nav">
                        <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Older Posts »</a>
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
                                <li v-for="(category ,index) in categoryLists"><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">My journey into the unkown.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Top 10 restaurant in California.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Sunset of summer.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Hike in mountains.</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h4>Categories</h4>
                            <ul>
                                <li v-for="(category ,index) in categoryLists"><a :href="'#article-list?category_id=' + category.id">{{category.class_name}}</a> ({{category.article_num}})</li>
                            </ul>
                        </div>
                        <div class="widget tagcloud">
                            <h4>Tags</h4>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">travel</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">blog</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">lifestyle</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">feature</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">mountain</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">design</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">restaurant</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">journey</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">classic</a>
                            <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">sunset</a>
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
                        console.log(response);
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
                        console.log(response);
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
                        console.log(response);
                        that.category = response.data.data;
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
