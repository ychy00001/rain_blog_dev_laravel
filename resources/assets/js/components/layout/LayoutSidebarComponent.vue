<template>
    <div class="col-lg-4 col-sm-4 column space">
        <aside id="sidebar">
            <div class="widget">
                <div class="search-form clearfix">
                    <input type="text" name="s" placeholder="Search...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="widget">
                <h4>关于我</h4>
                <p> 我是一只程序员！</p>
            </div>
            <div class="widget">
                <h4>联系方式</h4>
                <p>E-mail①：ychy00001@gmail.com</p>
                <p>E-mail②：ychy00001@163.com</p>
            </div>
            <div class="widget">
                <h4>最新博文</h4>
                <ul>
                    <li v-for="(artLatest ,index) in articleLatestLists"><a :href="'#/article/' + artLatest.id">{{artLatest.title}}</a></li>
                </ul>
            </div>
            <div class="widget tagcloud">
                <h4>分类</h4>
                <a  v-for="(category ,index) in categoryLists" :href="'#/article-list/1/' + category.id">{{category.class_name}}({{category.article_num}})</a>
            </div>
        </aside>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                articleLatestLists : [],
                categoryLists : [],
                ajaxCount : 0,
                ajaxTotal : 2,
            };
        },
        computed: {},

        methods: {
            getArticleLatestList:function () {
                let that = this;
                axios.get('/api/article/latest-list')
                    .then(function (response) {
                        that.articleLatestLists = response.data.data;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
            getCategoryList:function () {
                let that = this;
                axios.get('/api/category/list')
                    .then(function (response) {
                        that.categoryLists = response.data.data;
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
            this.getArticleLatestList();
            this.getCategoryList();
        },
        mounted() {
        }
    }
</script>
