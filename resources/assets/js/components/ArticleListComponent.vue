<template>
    <div class="col-lg-8 col-sm-8 column articleList">
        <page-loading v-if="ajaxCount != ajaxTotal"></page-loading>
        <div v-else>
            <header id="header-section">
                <h3>文章列表</h3>
                <div></div>
                <span v-if="isSearch">搜索：{{search}}</span>
                <span v-else>分类：{{categoryName}}</span>
            </header>
            <ul>
                <li v-for="(list ,index) in articleLists">
                    <p>
                        <a :href="'#/article/' + list.id">{{list.title}}</a>
                    </p>
                    <footer>
                        <hr>
                    </footer>
                </li>
            </ul>
            <pagination
                    :page-index="currentPage"
                    :totla="count"
                    :page-size="pageSize"
                    @change="pageChange">
            </pagination>
        </div>
    </div>
</template>

<script>
    import Pagination from './widget/PaginationComponent.vue';
    import PageLoading from './widget/LoadingComponent.vue'

    export default {
        name: "ArticleList",
        data(){
            return {
                articleLists : {},
                categoryName: "",
                isSearch: true,
                search: "",
                categoryId: 0,
                articleId : 0,
                ajaxCount : 0,
                ajaxTotal : 1,
                pageSize : 10, //每页显示10条数据
                currentPage : 1, //当前页码
                count : 0, //总记录数
            };
        },
        computed: {},

        methods: {
            /**
             * 获取文章分类列表
             */
            getArticleList:function () {
                let that = this;
                let url ='/api/article/list?page=' + this.currentPage;
                if(this.categoryId > 0){
                    url += '&category_id=' + this.categoryId;
                }
                axios.get(url)
                    .then(function (response) {
                        that.articleLists = response.data.data.data;
                        that.pageSize = response.data.data.per_page;
                        that.count = response.data.data.total;
                        that.categoryName = response.data.data.category_name;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
            /**
             * 获取文章搜索列表
             */
            searchArticleList:function () {
                let that = this;
                let url ='/api/article/search?page=' + this.currentPage + '&search=' + this.search;
                axios.get(url)
                    .then(function (response) {
                        that.articleLists = response.data.data.data;
                        that.pageSize = response.data.data.per_page;
                        that.count = response.data.data.total;
                        that.loadAjaxFinish();
                    })
                    .catch(function (error) {
                        console.log(error);
                        that.loadAjaxFinish();
                    });
            },
            //从page组件传递过来的当前page
            pageChange (page) {
                this.currentPage = page;
                this.getArticleList();
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
        },
        watch: {
            '$route' (to, from) {
                if ("articleList" === to.name) {
                    this.isSearch = false;
                    this.ajaxCount = 0;
                    this.ajaxTotal = 1;
                    if(!to.params.page){
                        this.currentPage = 1;
                    }else{
                        this.currentPage = parseInt(to.params.page);
                    }
                    if(!to.params.category){
                        this.categoryId = 0;
                    }else{
                        this.categoryId = parseInt(to.params.category);
                    }
                    this.getArticleList();
                }else if("articleSearch" === to.name){
                    this.isSearch = true;
                    this.ajaxCount = 0;
                    this.ajaxTotal = 1;
                    if(!to.params.page){
                        this.currentPage = 1;
                    }else{
                        this.currentPage = parseInt(to.params.page);
                    }
                    if(!to.params.search){
                        this.search = "";
                    }else{
                        this.search = to.params.search;
                    }
                    this.searchArticleList();
                }
            }
        },
        created() {
            console.log("ArticleList组件");
        },
        mounted() {
            if(!this.$route.params.page){
                this.currentPage = 1;
            }else{
                this.currentPage = parseInt(this.$route.params.page);
            }
            if(this.$route.name === "articleList"){
                this.isSearch = false;
                if(!this.$route.params.category){
                    this.categoryId = 0;
                }else{
                    this.categoryId = parseInt(this.$route.params.category);
                }
                this.getArticleList();
            }else if(this.$route.name === "articleSearch"){
                this.isSearch = true;
                if(!this.$route.params.search){
                    this.search = "";
                }else{
                    this.search = this.$route.params.search;
                }
                this.searchArticleList();
            }
        },
        components: {
            'Pagination': Pagination,
            'PageLoading': PageLoading
        }
    }
</script>
