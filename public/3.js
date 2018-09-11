webpackJsonp([3],{

/***/ 94:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(95)
/* template */
var __vue_template__ = __webpack_require__(96)
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
Component.options.__file = "resources/assets/js/components/IndexComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3d7cee7c", Component.options)
  } else {
    hotAPI.reload("data-v-3d7cee7c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 95:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    data: function data() {
        return {
            articleRecommendLists: [],
            ajaxCount: 0,
            ajaxTotal: 1
        };
    },

    computed: {},

    methods: {
        getArticleRecommendList: function getArticleRecommendList() {
            var that = this;
            axios.get('/api/article/recommend-list').then(function (response) {
                that.articleRecommendLists = response.data.data;
                that.loadAjaxFinish();
            }).catch(function (error) {
                that.loadAjaxFinish();
                console.log(error);
            });
        },
        loadAjaxFinish: function loadAjaxFinish() {
            this.ajaxCount++;
            if (this.ajaxCount === this.ajaxTotal) {
                this.$emit('load-layout-finish');
            }
        }

    },
    created: function created() {
        this.ajaxCount = 0;
        this.getArticleRecommendList();
    },
    mounted: function mounted() {}
});

/***/ }),

/***/ 96:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "col-lg-8 col-sm-8 column" },
    [
      _vm._l(_vm.articleRecommendLists, function(artRecList, index) {
        return _c("article", { staticClass: "post" }, [
          _c("header", [
            _c("div", { staticClass: "media" }, [
              artRecList.cover != undefined || artRecList.cover != ""
                ? _c("a", { attrs: { href: "#/article/" + artRecList.id } }, [
                    _c("img", {
                      attrs: { src: "upload/" + artRecList.cover, alt: "" }
                    })
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("h3", [
              _c("a", { attrs: { href: "#/article/" + artRecList.id } }, [
                _vm._v(_vm._s(artRecList.title))
              ])
            ]),
            _vm._v(" "),
            _c("span", [
              _vm._v(_vm._s(artRecList.release_at) + " / by "),
              _c("a", { attrs: { href: "#article?id=" + artRecList.id } }, [
                _vm._v("Rain")
              ]),
              _vm._v(" /\n                "),
              _c("a", { attrs: { href: "#/article/" + artRecList.id } }, [
                _vm._v(_vm._s(artRecList.comment_count) + " 评论")
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", {
            staticClass: "editor-styles",
            domProps: { innerHTML: _vm._s(artRecList.content) }
          }),
          _vm._v(" "),
          _c("footer", [
            _c("div", [
              _c("a", { attrs: { href: "#/article/" + artRecList.id } }, [
                _vm._v("内容详情...")
              ])
            ]),
            _vm._v(" "),
            _c("hr")
          ])
        ])
      }),
      _vm._v(" "),
      _vm._m(0)
    ],
    2
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("nav", { attrs: { id: "post-nav" } }, [
      _c("a", { attrs: { href: "#/article-list" } }, [_vm._v("更多文章 »")])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3d7cee7c", module.exports)
  }
}

/***/ })

});