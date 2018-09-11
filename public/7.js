webpackJsonp([7],{

/***/ 80:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(86)
/* template */
var __vue_template__ = __webpack_require__(87)
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
Component.options.__file = "resources/assets/js/components/widget/CommentTreeComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-498bfa24", Component.options)
  } else {
    hotAPI.reload("data-v-498bfa24", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 84:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(2)
/* script */
var __vue_script__ = __webpack_require__(85)
/* template */
var __vue_template__ = __webpack_require__(88)
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
Component.options.__file = "resources/assets/js/components/ArticleComponent.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-3eb13944", Component.options)
  } else {
    hotAPI.reload("data-v-3eb13944", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 85:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__widget_CommentTreeComponent_vue__ = __webpack_require__(80);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__widget_CommentTreeComponent_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__widget_CommentTreeComponent_vue__);
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
    name: "Article",
    data: function data() {
        return {
            articleDetail: {},
            articleComment: {},
            articleId: 0,
            ajaxCount: 0,
            ajaxTotal: 2,
            replayInfo: {
                id: 0,
                name: ""
            },
            commentInfo: {}
        };
    },

    computed: {},

    methods: {
        /**
         * 获取文章详情
         */
        getArticleDetail: function getArticleDetail() {
            var that = this;
            axios.get('/api/article/detail?id=' + that.articleId).then(function (response) {
                that.articleDetail = response.data.data;
                that.loadAjaxFinish();
            }).catch(function (error) {
                console.log(error);
                that.loadAjaxFinish();
            });
        },
        /**
         * 获取文章评论
         */
        getArticleComment: function getArticleComment() {
            var that = this;
            axios.get('/api/article/comment?a_id=' + that.articleId).then(function (response) {
                that.articleComment = response.data.data;
                that.loadAjaxFinish();
            }).catch(function (error) {
                console.log(error);
                that.loadAjaxFinish();
            });
        },
        /**
         * 添加文章评论
         */
        addArticleComment: function addArticleComment() {
            var that = this;
            this.commentInfo.article_id = this.articleId;
            this.commentInfo.pid = this.replayInfo.id;

            axios.post('/api/comment/add', that.commentInfo).then(function (response) {
                if (response.data.data === true) {
                    that.getArticleComment();
                } else {
                    console.log("添加失败!");
                }
            }).catch(function (error) {
                console.log(error);
            });
        },
        /**
         * 页面加载时ajax加载个数
         */
        loadAjaxFinish: function loadAjaxFinish() {
            this.ajaxCount++;
            if (this.ajaxCount === this.ajaxTotal) {
                this.$emit('load-layout-finish');
            }
        },
        /**
         * 子组件设置回复信息
         */
        setReplayInfo: function setReplayInfo(id, name) {
            console.log("收到子组件回复id:" + id + "----" + name);
            this.replayInfo.id = id;
            if (name === undefined) {
                name = "";
            }
            this.replayInfo.name = name;
        },
        /**
         * 取消回复
         */
        cancelReplay: function cancelReplay() {
            this.replayInfo.id = 0;
            this.replayInfo.name = "";
        }
    },
    watch: {
        '$route': function $route(to, from) {
            this.articleId = to.params.id;
            this.getArticleDetail();
            this.getArticleComment();
        }
    },
    created: function created() {
        this.articleId = this.$route.params.id;
        this.getArticleDetail();
        this.getArticleComment();
    },
    mounted: function mounted() {},

    components: {
        'CommentTree': __WEBPACK_IMPORTED_MODULE_0__widget_CommentTreeComponent_vue___default.a
    }
});

/***/ }),

/***/ 86:
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

/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'comment-tree',
    props: ['commentsData', 'level'],
    data: function data() {
        return {};
    },

    methods: {
        /**
         * 子组件设置回复信息
         */
        setReplayInfo: function setReplayInfo(id, name) {
            this.$emit('set-replay-info', id, name);
        }
    },
    created: function created() {},
    mounted: function mounted() {}
});

/***/ }),

/***/ 87:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "ul",
    {
      class: _vm.level == 0 ? "" : "children",
      attrs: { id: _vm.level == 0 ? "list-comments" : "" }
    },
    _vm._l(_vm.commentsData, function(commentItem, index) {
      return _c(
        "li",
        { class: "comment byuser even thread-even depth-" + commentItem.level },
        [
          _c("div", { staticClass: "comment-body" }, [
            _c("div", { staticClass: "comment-author vcard" }, [
              _c("img", {
                attrs: {
                  src:
                    _vm.level == 0
                      ? "/custom_resources/img/avatar.png"
                      : "/custom_resources/img/avatar2.png",
                  alt: ""
                }
              }),
              _vm._v(" "),
              _c("cite", { staticClass: "fn" }, [
                _vm._v(_vm._s(commentItem.name))
              ])
            ]),
            _vm._v(" "),
            _c("p", [_vm._v(_vm._s(commentItem.content))]),
            _vm._v(" "),
            _c("div", { staticClass: "comment-meta commentmetadata" }, [
              _vm._v(
                "\n                " + _vm._s(commentItem.created_at) + " / "
              ),
              _c(
                "a",
                {
                  staticClass: "comment-edit-link",
                  on: {
                    click: function($event) {
                      _vm.setReplayInfo(commentItem.id, commentItem.name)
                    }
                  }
                },
                [_vm._v("回复")]
              )
            ])
          ]),
          _vm._v(" "),
          commentItem.child
            ? _c("comment-tree", {
                attrs: {
                  commentsData: commentItem.child,
                  level: commentItem.level + 1
                },
                on: { "set-replay-info": _vm.setReplayInfo }
              })
            : _vm._e()
        ],
        1
      )
    })
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-498bfa24", module.exports)
  }
}

/***/ }),

/***/ 88:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "col-lg-8 col-sm-8 column" }, [
    _c("article", { staticClass: "post clearfix" }, [
      _c("header", [
        _c("div", { staticClass: "media" }, [
          _vm.articleDetail.cover != undefined
            ? _c(
                "a",
                {
                  attrs: {
                    href: "upload/" + _vm.articleDetail.cover,
                    "data-lightbox": "photo"
                  }
                },
                [
                  _c("img", {
                    attrs: { src: "upload/" + _vm.articleDetail.cover, alt: "" }
                  })
                ]
              )
            : _vm._e()
        ]),
        _vm._v(" "),
        _c("h3", [
          _c("a", { attrs: { href: "#/article/" + _vm.articleDetail.id } }, [
            _vm._v(_vm._s(_vm.articleDetail.title))
          ])
        ]),
        _vm._v(" "),
        _c("span", [
          _vm._v(_vm._s(_vm.articleDetail.release_at) + " / by "),
          _c("a", { attrs: { href: "#/article/" + _vm.articleDetail.id } }, [
            _vm._v("Rain")
          ]),
          _vm._v("  / "),
          _c("a", { attrs: { href: "#/article/" + _vm.articleDetail.id } }, [
            _vm._v(_vm._s(_vm.articleDetail.comment_count) + " Comments")
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", {
        staticClass: "editor-styles",
        domProps: { innerHTML: _vm._s(_vm.articleDetail.content) }
      })
    ]),
    _vm._v(" "),
    _vm._m(0),
    _vm._v(" "),
    _c(
      "div",
      { attrs: { id: "comments" } },
      [
        _c("h4", [_vm._v(_vm._s(_vm.articleComment.length) + " 条评论")]),
        _vm._v(" "),
        _c("comment-tree", {
          attrs: { level: 0, commentsData: this.articleComment },
          on: { "set-replay-info": _vm.setReplayInfo }
        }),
        _vm._v(" "),
        _c("div", { attrs: { id: "commentform" } }, [
          _c("h4", [_vm._v("来说两句呗~")]),
          _vm._v(" "),
          _c("div", { staticClass: "replayInfo clearfix" }, [
            _vm.replayInfo.id > 0
              ? _c("h5", [_vm._v("回复：" + _vm._s("@" + _vm.replayInfo.name))])
              : _vm._e(),
            _vm._v(" "),
            _vm.replayInfo.id > 0
              ? _c("button", { on: { click: _vm.cancelReplay } }, [
                  _vm._v("取消")
                ])
              : _vm._e()
          ]),
          _vm._v(" "),
          _c(
            "form",
            {
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  _vm.addArticleComment($event)
                }
              }
            },
            [
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.commentInfo.pid,
                    expression: "commentInfo.pid"
                  }
                ],
                attrs: { type: "hidden", name: "pid", value: "0" },
                domProps: { value: _vm.commentInfo.pid },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.commentInfo, "pid", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.commentInfo.name,
                    expression: "commentInfo.name"
                  }
                ],
                attrs: { name: "name", placeholder: "姓名*" },
                domProps: { value: _vm.commentInfo.name },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.commentInfo, "name", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.commentInfo.email,
                    expression: "commentInfo.email"
                  }
                ],
                attrs: { name: "email", placeholder: "邮箱*" },
                domProps: { value: _vm.commentInfo.email },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.commentInfo, "email", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _c("textarea", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.commentInfo.content,
                    expression: "commentInfo.content"
                  }
                ],
                attrs: { name: "comment", placeholder: "Message" },
                domProps: { value: _vm.commentInfo.content },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.commentInfo, "content", $event.target.value)
                  }
                }
              }),
              _vm._v(" "),
              _c("button", [_vm._v("留言")])
            ]
          )
        ])
      ],
      1
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("nav", { staticClass: "clearfix", attrs: { id: "post-nav-2" } }, [
      _c("div", { staticClass: "push-left" }, [
        _c(
          "a",
          {
            attrs: {
              href:
                "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
            }
          },
          [_vm._v("« 前一篇")]
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "push-right" }, [
        _c(
          "a",
          {
            attrs: {
              href:
                "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
            }
          },
          [_vm._v("后一篇 »")]
        )
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-3eb13944", module.exports)
  }
}

/***/ })

});