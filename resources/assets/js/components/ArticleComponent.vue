<template>

</template>

<script>
    export default {
        data(){
            return {
                articleDetail : {},
            };
        },
        computed: {},

        methods: {
            getArticleDetail:function () {
                let that = this;
                axios.get('/api/article/detail')
                    .then(function (response) {
                        that.articleDetail = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
        },
        created() {
            this.getArticleDetail();
            console.log('index页面创建!.')
        },
        mounted() {
            console.log('index页面挂载!.')
        }
    }
</script>
