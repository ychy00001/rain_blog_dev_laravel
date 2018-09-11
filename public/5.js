webpackJsonp([5],{

/***/ 93:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(94)
/* template */
var __vue_template__ = __webpack_require__(95)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/ArticleListComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-0bc7f240", Component.options)
  } else {
    hotAPI.reload("data-v-0bc7f240", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 94:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__widget_PaginationComponent_vue__ = __webpack_require__(96);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__widget_PaginationComponent_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__widget_PaginationComponent_vue__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            articleLists: {},
            categoryName: "",
            categoryId: 0,
            articleId: 0,
            ajaxCount: 0,
            ajaxTotal: 1,
            pageSize: 10, //每页显示10条数据
            currentPage: 1, //当前页码
            count: 0 //总记录数
        };
    },

    computed: {},

    methods: {
        /**
         * 获取文章详情
         */
        getArticleList: function getArticleList() {
            var that = this;
            var url = '/api/article/list?page=' + this.currentPage;
            if (this.categoryId > 0) {
                url += '&category_id=' + this.categoryId;
            }
            axios.get(url).then(function (response) {
                that.articleLists = response.data.data.data;
                that.pageSize = response.data.data.per_page;
                that.count = response.data.data.total;
                that.categoryName = response.data.data.categoryName;
                that.loadAjaxFinish();
            }).catch(function (error) {
                console.log(error);
                that.loadAjaxFinish();
            });
        },
        //从page组件传递过来的当前page
        pageChange: function pageChange(page) {
            this.currentPage = page;
            this.getArticleList();
        },

        /**
         * 页面加载时ajax加载个数
         */
        loadAjaxFinish: function loadAjaxFinish() {
            this.ajaxCount++;
            if (this.ajaxCount === this.ajaxTotal) {
                this.$emit('load-layout-finish');
            }
        }
    },
    watch: {
        '$route': function $route(to, from) {
            if (!to.params.currentPage) {
                this.currentPage = 1;
            } else {
                this.currentPage = to.params.currentPage;
            }
            if (!to.params.category) {
                this.categoryId = 0;
            } else {
                this.categoryId = to.params.categoryId;
            }
            this.getArticleList();
        }
    },
    created: function created() {
        if (!this.$route.params.currentPage) {
            this.currentPage = 1;
        } else {
            this.currentPage = this.$route.params.currentPage;
        }
        if (!this.$route.params.category) {
            this.categoryId = 0;
        } else {
            this.categoryId = this.$route.params.categoryId;
        }
        this.getArticleList();
    },
    mounted: function mounted() {},

    components: {
        'Pagination': __WEBPACK_IMPORTED_MODULE_0__widget_PaginationComponent_vue___default.a
    }
});

/***/ }),

/***/ 95:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "col-lg-8 col-sm-8 column articleList" },
    [
      _c("header", { attrs: { id: "header-section" } }, [
        _c("h3", [_vm._v("文章列表")]),
        _vm._v(" "),
        _c("div"),
        _vm._v(" "),
        _c("span", [_vm._v(_vm._s(_vm.categoryName))])
      ]),
      _vm._v(" "),
      _c(
        "ul",
        _vm._l(_vm.articleLists, function(list, index) {
          return _c("li", [
            _c("p", [
              _c("a", { attrs: { href: "#/article/" + list.id } }, [
                _vm._v(_vm._s(list.title))
              ])
            ]),
            _vm._v(" "),
            _vm._m(0, true)
          ])
        })
      ),
      _vm._v(" "),
      _c("pagination", {
        attrs: {
          "page-index": _vm.currentPage,
          totla: _vm.count,
          "page-size": _vm.pageSize
        },
        on: { change: _vm.pageChange }
      })
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("footer", [_c("hr")])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-0bc7f240", module.exports)
  }
}

/***/ }),

/***/ 96:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(97)
/* template */
var __vue_template__ = __webpack_require__(98)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/widget/PaginationComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-30a3fd6f", Component.options)
  } else {
    hotAPI.reload("data-v-30a3fd6f", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 97:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'Pagination',
    //通过props来接受从父组件传递过来的值
    props: {
        //页面中的可见页码，其他的以...替代, 必须是奇数
        perPages: {
            type: Number,
            default: 5
        },
        //当前页码
        pageIndex: {
            type: Number,
            default: 1
        },
        //每页显示条数
        pageSize: {
            type: Number,
            default: 10
        },
        //总记录数
        total: {
            type: Number,
            default: 1
        }
    },
    data: function data() {
        return {
            index: this.pageIndex, //当前页码
            limit: this.pageSize, //每页显示条数
            size: this.total || 1, //总记录数
            showPrevMore: false,
            showNextMore: false
        };
    },

    methods: {
        prev: function prev() {
            if (this.index > 1) {
                this.go(this.index - 1);
            }
        },
        next: function next() {
            if (this.index < this.pages) {
                this.go(this.index + 1);
            }
        },
        first: function first() {
            if (this.index !== 1) {
                this.go(1);
            }
        },
        last: function last() {
            if (this.index != this.pages) {
                this.go(this.pages);
            }
        },
        go: function go(page) {
            if (this.index !== page) {
                this.index = page;
                //父组件通过change方法来接受当前的页码
                this.$emit('change', this.index);
            }
        }
    },
    computed: {
        //计算总页码
        pages: function pages() {
            return Math.ceil(this.size / this.limit);
        },


        //计算页码，当count等变化时自动计算
        pagers: function pagers() {
            var array = [];
            var perPages = this.perPages;
            var pageCount = this.pages;
            var current = this.index;
            var _offset = (perPages - 1) / 2;

            var offset = {
                start: current - _offset,
                end: current + _offset

                //-1, 3
            };if (offset.start < 1) {
                offset.end = offset.end + (1 - offset.start);
                offset.start = 1;
            }
            if (offset.end > pageCount) {
                offset.start = offset.start - (offset.end - pageCount);
                offset.end = pageCount;
            }
            if (offset.start < 1) offset.start = 1;

            this.showPrevMore = offset.start > 1;
            this.showNextMore = offset.end < pageCount;

            for (var i = offset.start; i <= offset.end; i++) {
                array.push(i);
            }

            return array;
        }
    },
    watch: {
        pageIndex: function pageIndex(val) {
            this.index = val || 1;
        },
        pageSize: function pageSize(val) {
            this.limit = val || 10;
        },
        total: function total(val) {
            this.size = val || 1;
        }
    }
});

/***/ }),

/***/ 98:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "ul",
    { staticClass: "mo-paging" },
    [
      _c(
        "li",
        {
          class: [
            "paging-item",
            "paging-item--prev",
            { "paging-item--disabled": _vm.index === 1 }
          ],
          on: { click: _vm.prev }
        },
        [_vm._v("\n        上一页\n    ")]
      ),
      _vm._v(" "),
      _c(
        "li",
        {
          class: [
            "paging-item",
            "paging-item--first",
            { "paging-item--disabled": _vm.index === 1 }
          ],
          on: { click: _vm.first }
        },
        [_vm._v("\n        首页\n    ")]
      ),
      _vm._v(" "),
      _vm.showPrevMore
        ? _c("li", { class: ["paging-item", "paging-item--more"] }, [
            _vm._v("...\n    ")
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm._l(_vm.pagers, function(pager) {
        return _c(
          "li",
          {
            class: [
              "paging-item",
              { "paging-item--current": _vm.index === pager }
            ],
            on: {
              click: function($event) {
                _vm.go(pager)
              }
            }
          },
          [_vm._v(_vm._s(pager) + "\n    ")]
        )
      }),
      _vm._v(" "),
      _vm.showNextMore
        ? _c("li", { class: ["paging-item", "paging-item--more"] }, [
            _vm._v("\n        ...\n    ")
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "li",
        {
          class: [
            "paging-item",
            "paging-item--last",
            { "paging-item--disabled": _vm.index === _vm.pages }
          ],
          on: { click: _vm.last }
        },
        [_vm._v("\n        尾页\n    ")]
      ),
      _vm._v(" "),
      _c(
        "li",
        {
          class: [
            "paging-item",
            "paging-item--next",
            { "paging-item--disabled": _vm.index === _vm.pages }
          ],
          on: { click: _vm.next }
        },
        [_vm._v("\n        下一页\n    ")]
      )
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-30a3fd6f", module.exports)
  }
}

/***/ })

});