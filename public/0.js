webpackJsonp([0],{80:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var a=i(81),n=i.n(a);e.default={name:"ArticleList",data:function(){return{articleLists:{},categoryName:"",categoryId:0,articleId:0,ajaxCount:0,ajaxTotal:1,pageSize:10,currentPage:1,count:0}},computed:{},methods:{getArticleList:function(){var t=this,e="/api/article/list?page="+this.currentPage;this.categoryId>0&&(e+="&category_id="+this.categoryId),axios.get(e).then(function(e){t.articleLists=e.data.data.data,t.pageSize=e.data.data.per_page,t.count=e.data.data.total,t.categoryName=e.data.data.category_name,t.loadAjaxFinish()}).catch(function(e){console.log(e),t.loadAjaxFinish()})},pageChange:function(t){this.currentPage=t,this.getArticleList()},loadAjaxFinish:function(){this.ajaxCount++,this.ajaxCount===this.ajaxTotal&&this.$emit("load-layout-finish")}},watch:{$route:function(t,e){t.params.page?this.currentPage=parseInt(t.params.page):this.currentPage=1,t.params.category?this.categoryId=parseInt(t.params.category):this.categoryId=0,this.getArticleList()}},created:function(){console.log("ArticleList组件")},mounted:function(){this.$route.params.page?this.currentPage=parseInt(this.$route.params.page):this.currentPage=1,this.$route.params.category?this.categoryId=parseInt(this.$route.params.category):this.categoryId=0,this.getArticleList()},components:{Pagination:n.a}}},81:function(t,e,i){var a=i(2)(i(82),i(83),!1,null,null,null);t.exports=a.exports},82:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"Pagination",props:{perPages:{type:Number,default:5},pageIndex:{type:Number,default:1},pageSize:{type:Number,default:10},total:{type:Number,default:1}},data:function(){return{index:this.pageIndex,limit:this.pageSize,size:this.total||1,showPrevMore:!1,showNextMore:!1}},methods:{prev:function(){this.index>1&&this.go(this.index-1)},next:function(){this.index<this.pages&&this.go(this.index+1)},first:function(){1!==this.index&&this.go(1)},last:function(){this.index!=this.pages&&this.go(this.pages)},go:function(t){this.index!==t&&(this.index=t,this.$emit("change",this.index))}},computed:{pages:function(){return Math.ceil(this.size/this.limit)},pagers:function(){var t=[],e=this.perPages,i=this.pages,a=this.index,n=(e-1)/2,s={start:a-n,end:a+n};s.start<1&&(s.end=s.end+(1-s.start),s.start=1),s.end>i&&(s.start=s.start-(s.end-i),s.end=i),s.start<1&&(s.start=1),this.showPrevMore=s.start>1,this.showNextMore=s.end<i;for(var r=s.start;r<=s.end;r++)t.push(r);return t}},watch:{pageIndex:function(t){this.index=t||1},pageSize:function(t){this.limit=t||10},total:function(t){this.size=t||1}}}},83:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("ul",{staticClass:"mo-paging"},[i("li",{class:["paging-item","paging-item--prev",{"paging-item--disabled":1===t.index}],on:{click:t.prev}},[t._v("\n        上一页\n    ")]),t._v(" "),i("li",{class:["paging-item","paging-item--first",{"paging-item--disabled":1===t.index}],on:{click:t.first}},[t._v("\n        首页\n    ")]),t._v(" "),t.showPrevMore?i("li",{class:["paging-item","paging-item--more"]},[t._v("...\n    ")]):t._e(),t._v(" "),t._l(t.pagers,function(e){return i("li",{class:["paging-item",{"paging-item--current":t.index===e}],on:{click:function(i){t.go(e)}}},[t._v(t._s(e)+"\n    ")])}),t._v(" "),t.showNextMore?i("li",{class:["paging-item","paging-item--more"]},[t._v("\n        ...\n    ")]):t._e(),t._v(" "),i("li",{class:["paging-item","paging-item--last",{"paging-item--disabled":t.index===t.pages}],on:{click:t.last}},[t._v("\n        尾页\n    ")]),t._v(" "),i("li",{class:["paging-item","paging-item--next",{"paging-item--disabled":t.index===t.pages}],on:{click:t.next}},[t._v("\n        下一页\n    ")])],2)},staticRenderFns:[]}},84:function(t,e){t.exports={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"col-lg-8 col-sm-8 column articleList"},[i("header",{attrs:{id:"header-section"}},[i("h3",[t._v("文章列表")]),t._v(" "),i("div"),t._v(" "),i("span",[t._v("分类："+t._s(t.categoryName))])]),t._v(" "),i("ul",t._l(t.articleLists,function(e,a){return i("li",[i("p",[i("a",{attrs:{href:"#/article/"+e.id}},[t._v(t._s(e.title))])]),t._v(" "),t._m(0,!0)])})),t._v(" "),i("pagination",{attrs:{"page-index":t.currentPage,totla:t.count,"page-size":t.pageSize},on:{change:t.pageChange}})],1)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("footer",[e("hr")])}]}},87:function(t,e,i){var a=i(2)(i(80),i(84),!1,null,null,null);t.exports=a.exports}});