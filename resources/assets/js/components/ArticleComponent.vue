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
        <nav id="post-nav-2" class="clearfix">
            <div class="push-left">
                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#">« 前一篇</a>
                <!--<h6>Hike in mountain</h6>-->
            </div>
            <div class="push-right">
                <a href="http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#">后一篇 »</a>
                <!--<h6>Sunset in summer.</h6>-->
            </div>
        </nav>
        <div id="comments">
            <h4>{{articleComment.length}} 条评论</h4>
            <comment-tree :level="0" :commentsData="this.articleComment" v-on:set-replay-info="setReplayInfo"></comment-tree>
            <div id="commentform">
                <h4>来说两句呗~</h4>
                <div class="replayInfo clearfix">
                    <h5 v-if="replayInfo.id > 0">回复：{{"@"+replayInfo.name}}</h5>
                    <button v-if="replayInfo.id > 0" @click="cancelReplay">取消</button>
                </div>
                <form @submit.prevent="addArticleComment">
                    <input type="hidden" name="pid" v-model="commentInfo.pid" value="0">
                    <input name="name" v-model="commentInfo.name" placeholder="姓名*">
                    <input name="email" v-model="commentInfo.email" placeholder="邮箱*">
                    <textarea name="comment" v-model="commentInfo.content" placeholder="Message"></textarea>
                    <button>留言</button>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
    import CommentTree from './widget/CommentTreeComponent.vue'

    export default {
        name: "Article",
        data(){
            return {
                articleDetail : {},
                articleComment : {},
                articleId : 0,
                ajaxCount : 0,
                ajaxTotal : 2,
                replayInfo : {
                    id : 0,
                    name : ""
                },
                commentInfo : {},
            };
        },
        computed: {},

        methods: {
            /**
             * 获取文章详情
             */
            getArticleDetail:function () {
                let that = this;
                axios.get('/api/article/detail?id='+that.articleId)
                    .then(function (response) {
                        that.articleDetail = response.data.data;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
            /**
             * 获取文章评论
             */
            getArticleComment:function () {
                let that = this;
                axios.get('/api/article/comment?a_id='+that.articleId)
                    .then(function (response) {
                        that.articleComment = response.data.data;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
            /**
             * 添加文章评论
             */
            addArticleComment:function () {
                let that = this;
                this.commentInfo.article_id = this.articleId;
                this.commentInfo.pid = this.replayInfo.id;

                axios.post('/api/comment/add',that.commentInfo)
                    .then(function (response) {
                        if(response.data.data === true){
                            that.getArticleComment();
                        }else{
                            console.log("添加失败!");
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            /**
             * 页面加载时ajax加载个数
             */
            loadAjaxFinish:function () {
                this.ajaxCount++;
                if(this.ajaxCount === this.ajaxTotal){
                    this.$emit('load-layout-finish');
                }
            },
            /**
             * 子组件设置回复信息
             */
            setReplayInfo:function (id, name) {
                console.log("收到子组件回复id:"+id+"----"+name);
                this.replayInfo.id = id;
                if(name === undefined){
                    name = "";
                }
                this.replayInfo.name = name;
            },
            /**
             * 取消回复
             */
            cancelReplay:function () {
                this.replayInfo.id = 0;
                this.replayInfo.name = "";
            },
        },
        watch: {
            '$route' (to, from) {
                this.articleId = to.params.id;
                this.getArticleDetail();
                this.getArticleComment();
            }
        },
        created() {
            this.articleId = this.$route.params.id;
            this.getArticleDetail();
            this.getArticleComment();
        },
        mounted() {
        },
        components: {
            'CommentTree': CommentTree
        }
    }
</script>
