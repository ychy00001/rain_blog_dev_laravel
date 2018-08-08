<template>
    <div class="col-lg-8 col-sm-8 column">
        <article class="post clearfix">
            <header>
                <div class="media">
                    <a v-if="articleDetail.cover != undefined" :href="'upload/'+articleDetail.cover" data-lightbox="photo"><img :src="'upload/'+articleDetail.cover" alt=""></a>
                </div>
                <h3><a :href="'#/article/' + articleDetail.id">{{articleDetail.title}}</a></h3>
                <span>{{articleDetail.release_at}} / by <a :href="'#/article/' + articleDetail.id">Rain</a>  / <a :href="'#/article/' + articleDetail.id">{{articleDetail.comment_count}} Comments</a></span>
            </header>
            <div class="editor-styles" v-html="articleDetail.content"></div>
        </article>
        <div id="post-author">
            <img src="/custom_resources/img/avatar2.png" alt="">
            <h4>Hi, I’m studio-themes</h4>
            <p>Egestas adipiscing purus elementum risus turpis tincidunt, nascetur a, ultricies lacus nisi platea risus sed tincidunt adipiscing.</p>
        </div>
        <nav id="post-nav-2" class="clearfix">
            <div class="push-left">
                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#">« Previous</a>
                <h6>Hike in mountain</h6>
            </div>
            <div class="push-right">
                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#">Next »</a>
                <h6>Sunset in summer.</h6>
            </div>
        </nav>
        <div id="comments">
            <h4>4 Comments</h4>
            <ul id="list-comments">
                <li class="comment byuser even thread-even depth-1">
                    <div class="comment-body">
                        <div class="comment-author vcard">
                            <img src="/custom_resources/img/avatar.png" alt="">
                            <cite class="fn">John Doe</cite>
                        </div>
                        <p>Ac amet turpis diam turpis dolor, parturient sit. Porttitor risus. Turpis in aenean nunc cum natoque nec. Mattis urna in, montes et?</p>
                        <div class="comment-meta commentmetadata"><a href="http://andon-wordpress.studio-themes.com/338/#comment-43">
                            December 22, 2014 at 11:45 pm /</a>&nbsp;&nbsp;<a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#" class="comment-edit-link">Reply</a>
                        </div>
                    </div>
                </li>
                <li class="comment byuser even thread-even depth-1">
                    <div class="comment-body">
                        <div class="comment-author vcard">
                            <img src="/custom_resources/img/avatar.png" alt="">
                            <cite class="fn">Chris Cilinis</cite>
                        </div>
                        <p>Phasellus quis nisi ut dolor pretium aliquet non ullamcorper ipsum. Integer eleifend est nec arcu sagittis, eget ornare metus bibendum.</p>
                        <div class="comment-meta commentmetadata"><a href="http://andon-wordpress.studio-themes.com/338/#comment-43">
                            December 22, 2014 at 11:45 pm /</a>&nbsp;&nbsp;<a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#" class="comment-edit-link">Reply</a>
                        </div>
                    </div>
                    <ul class="children">
                        <li class="comment byuser even thread-even depth-1">
                            <div class="comment-body">
                                <div class="comment-author vcard">
                                    <img src="/custom_resources/img/avatar2.png" alt="">
                                    <cite class="fn">studio-themes (Reply)</cite>
                                </div>
                                <p>Adipiscing aliquam a odio phasellus auctor penatibus, ac facilisis. Hac est tortor vel mid.</p>
                                <div class="comment-meta commentmetadata"><a href="http://andon-wordpress.studio-themes.com/338/#comment-43">
                                    December 22, 2014 at 13:53 pm /</a>&nbsp;&nbsp;<a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#" class="comment-edit-link">Reply</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="comment byuser even thread-even depth-1">
                    <div class="comment-body">
                        <div class="comment-author vcard">
                            <img src="/custom_resources/img/avatar.png" alt="">
                            <cite class="fn">Alan Smith</cite>
                        </div>
                        <p>Maecenas scelerisque nibh nec eros mattis id suscipit sem viverra estibulum nec est nec urna.</p>
                        <div class="comment-meta commentmetadata"><a href="http://andon-wordpress.studio-themes.com/338/#comment-43">
                            December 23, 2014 at 8:00 am /</a>&nbsp;&nbsp;<a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#" class="comment-edit-link">Reply</a>
                        </div>
                    </div>
                </li>
            </ul>
            <div id="commentform">
                <h4>Leave a reply</h4>
                <form method="post">
                    <input type="text" name="personal" placeholder="Name*" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                    <input type="text" name="email" placeholder="Email*">
                    <input type="text" name="website" placeholder="Website">
                    <textarea name="comment" placeholder="Message"></textarea>
                    <button type="submit">Send messsage</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                articleDetail : {},
                articleId : 0,
            };
        },
        computed: {},

        methods: {
            getArticleDetail:function () {
                let that = this;
                axios.get('/api/article/detail?id='+that.articleId)
                    .then(function (response) {
                        that.articleDetail = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },
        watch: {
            '$route' (to, from) {
                this.articleId = to.params.id;
                this.getArticleDetail();
            }
        },
        created() {
            this.articleId = this.$route.params.id;
            this.getArticleDetail();
            console.log('article页面创建!.')
        },
        mounted() {
            console.log('article页面挂载!.')
        }
    }
</script>
