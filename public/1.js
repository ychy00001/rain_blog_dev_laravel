webpackJsonp([1],{

/***/ 217:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(15)
/* script */
var __vue_script__ = __webpack_require__(220)
/* template */
var __vue_template__ = __webpack_require__(221)
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

/***/ 220:
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
            articleDetail: {},
            articleId: 0
        };
    },

    computed: {},

    methods: {
        getArticleDetail: function getArticleDetail() {
            var that = this;
            axios.get('/api/article/detail?id=' + that.articleId).then(function (response) {
                that.articleDetail = response.data.data;
            }).catch(function (error) {
                console.log(error);
            });
        }
    },
    watch: {
        '$route': function $route(to, from) {
            this.articleId = to.params.id;
            this.getArticleDetail();
        }
    },
    created: function created() {
        this.articleId = this.$route.params.id;
        this.getArticleDetail();
        console.log('article页面创建!.');
    },
    mounted: function mounted() {
        console.log('article页面挂载!.');
    }
});

/***/ }),

/***/ 221:
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
    _vm._m(1),
    _vm._v(" "),
    _vm._m(2)
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { attrs: { id: "post-author" } }, [
      _c("img", {
        attrs: { src: "/custom_resources/img/avatar2.png", alt: "" }
      }),
      _vm._v(" "),
      _c("h4", [_vm._v("Hi, I’m studio-themes")]),
      _vm._v(" "),
      _c("p", [
        _vm._v(
          "Egestas adipiscing purus elementum risus turpis tincidunt, nascetur a, ultricies lacus nisi platea risus sed tincidunt adipiscing."
        )
      ])
    ])
  },
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
          [_vm._v("« Previous")]
        ),
        _vm._v(" "),
        _c("h6", [_vm._v("Hike in mountain")])
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
          [_vm._v("Next »")]
        ),
        _vm._v(" "),
        _c("h6", [_vm._v("Sunset in summer.")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { attrs: { id: "comments" } }, [
      _c("h4", [_vm._v("4 Comments")]),
      _vm._v(" "),
      _c("ul", { attrs: { id: "list-comments" } }, [
        _c("li", { staticClass: "comment byuser even thread-even depth-1" }, [
          _c("div", { staticClass: "comment-body" }, [
            _c("div", { staticClass: "comment-author vcard" }, [
              _c("img", {
                attrs: { src: "/custom_resources/img/avatar.png", alt: "" }
              }),
              _vm._v(" "),
              _c("cite", { staticClass: "fn" }, [_vm._v("John Doe")])
            ]),
            _vm._v(" "),
            _c("p", [
              _vm._v(
                "Ac amet turpis diam turpis dolor, parturient sit. Porttitor risus. Turpis in aenean nunc cum natoque nec. Mattis urna in, montes et?"
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "comment-meta commentmetadata" }, [
              _c(
                "a",
                {
                  attrs: {
                    href:
                      "http://andon-wordpress.studio-themes.com/338/#comment-43"
                  }
                },
                [
                  _vm._v(
                    "\n                        December 22, 2014 at 11:45 pm /"
                  )
                ]
              ),
              _vm._v("  "),
              _c(
                "a",
                {
                  staticClass: "comment-edit-link",
                  attrs: {
                    href:
                      "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
                  }
                },
                [_vm._v("Reply")]
              )
            ])
          ])
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "comment byuser even thread-even depth-1" }, [
          _c("div", { staticClass: "comment-body" }, [
            _c("div", { staticClass: "comment-author vcard" }, [
              _c("img", {
                attrs: { src: "/custom_resources/img/avatar.png", alt: "" }
              }),
              _vm._v(" "),
              _c("cite", { staticClass: "fn" }, [_vm._v("Chris Cilinis")])
            ]),
            _vm._v(" "),
            _c("p", [
              _vm._v(
                "Phasellus quis nisi ut dolor pretium aliquet non ullamcorper ipsum. Integer eleifend est nec arcu sagittis, eget ornare metus bibendum."
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "comment-meta commentmetadata" }, [
              _c(
                "a",
                {
                  attrs: {
                    href:
                      "http://andon-wordpress.studio-themes.com/338/#comment-43"
                  }
                },
                [
                  _vm._v(
                    "\n                        December 22, 2014 at 11:45 pm /"
                  )
                ]
              ),
              _vm._v("  "),
              _c(
                "a",
                {
                  staticClass: "comment-edit-link",
                  attrs: {
                    href:
                      "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
                  }
                },
                [_vm._v("Reply")]
              )
            ])
          ]),
          _vm._v(" "),
          _c("ul", { staticClass: "children" }, [
            _c(
              "li",
              { staticClass: "comment byuser even thread-even depth-1" },
              [
                _c("div", { staticClass: "comment-body" }, [
                  _c("div", { staticClass: "comment-author vcard" }, [
                    _c("img", {
                      attrs: {
                        src: "/custom_resources/img/avatar2.png",
                        alt: ""
                      }
                    }),
                    _vm._v(" "),
                    _c("cite", { staticClass: "fn" }, [
                      _vm._v("studio-themes (Reply)")
                    ])
                  ]),
                  _vm._v(" "),
                  _c("p", [
                    _vm._v(
                      "Adipiscing aliquam a odio phasellus auctor penatibus, ac facilisis. Hac est tortor vel mid."
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "comment-meta commentmetadata" }, [
                    _c(
                      "a",
                      {
                        attrs: {
                          href:
                            "http://andon-wordpress.studio-themes.com/338/#comment-43"
                        }
                      },
                      [
                        _vm._v(
                          "\n                                December 22, 2014 at 13:53 pm /"
                        )
                      ]
                    ),
                    _vm._v("  "),
                    _c(
                      "a",
                      {
                        staticClass: "comment-edit-link",
                        attrs: {
                          href:
                            "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
                        }
                      },
                      [_vm._v("Reply")]
                    )
                  ])
                ])
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "comment byuser even thread-even depth-1" }, [
          _c("div", { staticClass: "comment-body" }, [
            _c("div", { staticClass: "comment-author vcard" }, [
              _c("img", {
                attrs: { src: "/custom_resources/img/avatar.png", alt: "" }
              }),
              _vm._v(" "),
              _c("cite", { staticClass: "fn" }, [_vm._v("Alan Smith")])
            ]),
            _vm._v(" "),
            _c("p", [
              _vm._v(
                "Maecenas scelerisque nibh nec eros mattis id suscipit sem viverra estibulum nec est nec urna."
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "comment-meta commentmetadata" }, [
              _c(
                "a",
                {
                  attrs: {
                    href:
                      "http://andon-wordpress.studio-themes.com/338/#comment-43"
                  }
                },
                [
                  _vm._v(
                    "\n                        December 23, 2014 at 8:00 am /"
                  )
                ]
              ),
              _vm._v("  "),
              _c(
                "a",
                {
                  staticClass: "comment-edit-link",
                  attrs: {
                    href:
                      "http://view.jqueryfuns.com/%E9%A2%84%E8%A7%88-/2015/1/14/706c9c78623f129a044220c0ad3c2013/single.html#"
                  }
                },
                [_vm._v("Reply")]
              )
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { attrs: { id: "commentform" } }, [
        _c("h4", [_vm._v("Leave a reply")]),
        _vm._v(" "),
        _c("form", { attrs: { method: "post" } }, [
          _c("input", {
            staticStyle: {
              "background-image":
                'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==")',
              "background-repeat": "no-repeat",
              "background-attachment": "scroll",
              "background-size": "16px 18px",
              "background-position": "98% 50%"
            },
            attrs: { type: "text", name: "personal", placeholder: "Name*" }
          }),
          _vm._v(" "),
          _c("input", {
            attrs: { type: "text", name: "email", placeholder: "Email*" }
          }),
          _vm._v(" "),
          _c("input", {
            attrs: { type: "text", name: "website", placeholder: "Website" }
          }),
          _vm._v(" "),
          _c("textarea", {
            attrs: { name: "comment", placeholder: "Message" }
          }),
          _vm._v(" "),
          _c("button", { attrs: { type: "submit" } }, [_vm._v("Send messsage")])
        ])
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