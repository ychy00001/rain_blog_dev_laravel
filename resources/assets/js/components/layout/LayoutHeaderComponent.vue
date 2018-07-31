<template>
    <div id="home-sticky-wrapper" class="sticky-wrapper" style="height: 130px;">
        <header id="home" class="header-style-1 sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 clearfix">
                        <div id="logo-container">
                            <div class="tb">
                                <div class="tb-cell">
                                    <a href="/">
                                        <img src="/custom_resources/img/logo.png" class="standard-logo" alt="">
                                    </a>
                                </div>
                            </div>
                            <div id="mobile-button">
                                <hr>
                                <hr>
                                <hr>
                            </div>
                        </div>
                        <div id="menu-container">
                            <nav>
                                <ul class="clearfix">
                                    <li v-for="(menuList, index) in menuLists" :class="index==0?'current-menu-item':''">
                                        <a :href="'#'+menuList.url">{{menuList.name}}</a>
                                        <ul v-for="childMenuList in menuList.child_menu" class="sub-menu">
                                            <li>
                                                <a :href="'#'+childMenuList.url" >{{childMenuList.name}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                menuLists : []
            };
        },
        computed: {},

        methods: {
            getMenuList:function () {
                let that = this;
                axios.get('/api/menu/list')
                    .then(function (response) {
                        console.log(response);
                        that.menuLists = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getMenuList();
            console.log('header页面创建!.')
        },
        mounted() {
            console.log('header页面挂载!.')
        }
    }
</script>
