<template>
    <ul :id="level==0?'list-comments':''" :class="level==0?'':'children'">
        <li v-for="(commentItem,index) in commentsData"
            :class="'comment byuser even thread-even depth-' + commentItem.level">
            <div class="comment-body">
                <div class="comment-author vcard">
                    <img :src="level==0?'/custom_resources/img/avatar.png':'/custom_resources/img/avatar2.png'" alt="">
                    <cite class="fn">{{commentItem.name}}</cite>
                </div>
                <p>{{commentItem.content}}</p>
                <div class="comment-meta commentmetadata">
                    {{commentItem.created_at}} / <a @click="setReplayInfo(commentItem.id,commentItem.name)"  class="comment-edit-link">回复</a>
                </div>
            </div>
            <comment-tree v-if="commentItem.child" :commentsData="commentItem.child" :level="commentItem.level+1" v-on:set-replay-info="setReplayInfo"></comment-tree>
        </li>
    </ul>
</template>

<script>
    export default {
        name: 'comment-tree',
        props: ['commentsData', 'level'],
        data() {
            return {};
        },
        methods: {
            /**
             * 子组件设置回复信息
             */
            setReplayInfo:function (id, name) {
                this.$emit('set-replay-info',id,name)
            },
        },
        created() {
        },
        mounted() {
        }
    }
</script>
