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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis pulvinar, tempor odio sed, adipiscing dolor.</p>
                        </div>
                        <div class="widget">
                            <h4>Find me on</h4>
                            <p>
                                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#" class="social-1"><i class="fa fa-facebook"></i></a>
                                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#" class="social-1"><i class="fa fa-twitter"></i></a>
                                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#" class="social-1"><i class="fa fa-google-plus"></i></a>
                                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#" class="social-1"><i class="fa fa-linkedin"></i></a>
                            </p>
                        </div>
                        <div class="widget">
                            <h4>Latest Posts</h4>
                            <ul>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">My journey into the unkown.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Top 10 restaurant in California.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Sunset of summer.</a></li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/index.html#">Hike in mountains.</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/category_travel.html">Travel</a> (4)</li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/category_lifestyle.html">Lifestyle</a> (3)</li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/category_video.html">Video</a> (1)</li>
                                <li><a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/category_music.html">Music</a> (5)</li>
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
                articleRecommendLists : []
            };
        },
        computed: {},

        methods: {
            getArticleList:function () {
                let that = this;
                axios.get('/api/article/recommend-list')
                    .then(function (response) {
                        console.log(response);
                        that.articleRecommendLists = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getArticleList();
            console.log('index页面创建!.')
        },
        mounted() {
            console.log('index页面挂载!.')
        }
    }
</script>
