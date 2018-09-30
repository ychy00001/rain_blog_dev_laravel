webpackJsonp([1],{72:function(t,e,a){var n=a(2)(a(73),a(74),!1,null,null,null);t.exports=n.exports},73:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"PageLoading",data:function(){return{}},methods:{},computed:{},watch:{}}},74:function(t,e){t.exports={render:function(){this.$createElement;this._self._c;return this._m(0)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"loading_layout"},[e("img",{staticClass:"loading_img",attrs:{src:"/custom_resources/img/page_loading.gif",alt:"页面加载loading图"}})])}]}},77:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=a(78),i=a.n(n),o=a(72),l=a.n(o);e.default={name:"Article",data:function(){return{articleDetail:{},articleComment:{},articleId:0,ajaxCount:0,ajaxTotal:2,replayInfo:{id:0,name:""},commentInfo:{}}},computed:{},methods:{getArticleDetail:function(){var t=this;axios.get("/api/article/detail?id="+t.articleId).then(function(e){t.articleDetail=e.data.data,t.loadAjaxFinish()}).catch(function(e){console.log(e),t.loadAjaxFinish()})},getArticleComment:function(){var t=this;axios.get("/api/article/comment?a_id="+t.articleId).then(function(e){t.articleComment=e.data.data,t.loadAjaxFinish()}).catch(function(e){console.log(e),t.loadAjaxFinish()})},addArticleComment:function(){var t=this;this.commentInfo.article_id=this.articleId,this.commentInfo.pid=this.replayInfo.id,axios.post("/api/comment/add",t.commentInfo).then(function(e){!0===e.data.data?t.getArticleComment():console.log("添加失败!")}).catch(function(t){console.log(t)})},loadAjaxFinish:function(){this.ajaxCount++,this.ajaxCount===this.ajaxTotal&&this.$emit("load-layout-finish")},setReplayInfo:function(t,e){console.log("收到子组件回复id:"+t+"----"+e),this.replayInfo.id=t,void 0===e&&(e=""),this.replayInfo.name=e},cancelReplay:function(){this.replayInfo.id=0,this.replayInfo.name=""}},watch:{$route:function(t,e){"article"===t.name&&(this.ajaxCount=0,this.ajaxTotal=2,this.articleId=t.params.id,this.getArticleDetail(),this.getArticleComment())}},created:function(){this.articleId=this.$route.params.id,this.getArticleDetail(),this.getArticleComment()},mounted:function(){},components:{CommentTree:i.a,PageLoading:l.a}}},78:function(t,e,a){var n=a(2)(a(79),a(80),!1,null,null,null);t.exports=n.exports},79:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"comment-tree",props:["commentsData","level"],data:function(){return{}},methods:{setReplayInfo:function(t,e){this.$emit("set-replay-info",t,e)}},created:function(){},mounted:function(){}}},80:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{class:0==t.level?"":"children",attrs:{id:0==t.level?"list-comments":""}},t._l(t.commentsData,function(e,n){return a("li",{class:"comment byuser even thread-even depth-"+e.level},[a("div",{staticClass:"comment-body"},[a("div",{staticClass:"comment-author vcard"},[a("img",{attrs:{src:0==t.level?"/custom_resources/img/avatar.png":"/custom_resources/img/avatar2.png",alt:""}}),t._v(" "),a("cite",{staticClass:"fn"},[t._v(t._s(e.name))])]),t._v(" "),a("p",[t._v(t._s(e.content))]),t._v(" "),a("div",{staticClass:"comment-meta commentmetadata"},[t._v("\n                "+t._s(e.created_at)+" / "),a("a",{staticClass:"comment-edit-link",on:{click:function(a){t.setReplayInfo(e.id,e.name)}}},[t._v("回复")])])]),t._v(" "),e.child?a("comment-tree",{attrs:{commentsData:e.child,level:e.level+1},on:{"set-replay-info":t.setReplayInfo}}):t._e()],1)}))},staticRenderFns:[]}},81:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"col-lg-8 col-sm-8 column"},[t.ajaxTotal!=t.ajaxCount?a("page-loading"):a("div",[a("article",{staticClass:"post clearfix"},[a("header",[a("div",{staticClass:"media"},[void 0!=t.articleDetail.cover?a("a",{attrs:{href:"upload/"+t.articleDetail.cover,"data-lightbox":"photo"}},[a("img",{attrs:{src:"upload/"+t.articleDetail.cover,alt:""}})]):t._e()]),t._v(" "),a("h3",[a("a",{attrs:{href:"#/article/"+t.articleDetail.id}},[t._v(t._s(t.articleDetail.title))])]),t._v(" "),a("span",[t._v(t._s(t.articleDetail.release_at)+" / by "),a("a",{attrs:{href:"#/article/"+t.articleDetail.id}},[t._v("Rain")]),t._v("  / "),a("a",{attrs:{href:"#/article/"+t.articleDetail.id}},[t._v(t._s(t.articleDetail.comment_count)+" Comments")])])]),t._v(" "),a("div",{staticClass:"editor-styles",domProps:{innerHTML:t._s(t.articleDetail.content)}})]),t._v(" "),a("nav",{staticClass:"clearfix",attrs:{id:"post-nav-2"}},[a("div",{staticClass:"push-left"},[a("a",{attrs:{href:"http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"}},[t._v("« 前一篇")])]),t._v(" "),a("div",{staticClass:"push-right"},[a("a",{attrs:{href:"http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"}},[t._v("后一篇 »")])])]),t._v(" "),a("div",{attrs:{id:"comments"}},[a("h4",[t._v(t._s(t.articleComment.length)+" 条评论")]),t._v(" "),a("comment-tree",{attrs:{level:0,commentsData:this.articleComment},on:{"set-replay-info":t.setReplayInfo}}),t._v(" "),a("div",{attrs:{id:"commentform"}},[a("h4",[t._v("来说两句呗~")]),t._v(" "),a("div",{staticClass:"replayInfo clearfix"},[t.replayInfo.id>0?a("h5",[t._v("回复："+t._s("@"+t.replayInfo.name))]):t._e(),t._v(" "),t.replayInfo.id>0?a("button",{on:{click:t.cancelReplay}},[t._v("取消")]):t._e()]),t._v(" "),a("form",{on:{submit:function(e){e.preventDefault(),t.addArticleComment(e)}}},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.commentInfo.pid,expression:"commentInfo.pid"}],attrs:{type:"hidden",name:"pid",value:"0"},domProps:{value:t.commentInfo.pid},on:{input:function(e){e.target.composing||t.$set(t.commentInfo,"pid",e.target.value)}}}),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.commentInfo.name,expression:"commentInfo.name"}],attrs:{name:"name",placeholder:"姓名*"},domProps:{value:t.commentInfo.name},on:{input:function(e){e.target.composing||t.$set(t.commentInfo,"name",e.target.value)}}}),t._v(" "),a("input",{directives:[{name:"model",rawName:"v-model",value:t.commentInfo.email,expression:"commentInfo.email"}],attrs:{name:"email",placeholder:"邮箱*"},domProps:{value:t.commentInfo.email},on:{input:function(e){e.target.composing||t.$set(t.commentInfo,"email",e.target.value)}}}),t._v(" "),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.commentInfo.content,expression:"commentInfo.content"}],attrs:{name:"comment",placeholder:"Message"},domProps:{value:t.commentInfo.content},on:{input:function(e){e.target.composing||t.$set(t.commentInfo,"content",e.target.value)}}}),t._v(" "),a("button",[t._v("留言")])])])],1)])],1)},staticRenderFns:[]}},90:function(t,e,a){var n=a(2)(a(77),a(81),!1,null,null,null);t.exports=n.exports}});