(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[55],{

/***/ "../User/Resources/js/complex_case_categories/Detail.vue":
/*!***************************************************************!*\
  !*** ../User/Resources/js/complex_case_categories/Detail.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Detail.vue?vue&type=template&id=29be936c& */ "../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c&");
/* harmony import */ var _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Detail.vue?vue&type=script&lang=js& */ "../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "User/Resources/js/complex_case_categories/Detail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c&":
/*!**********************************************************************************************!*\
  !*** ../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=template&id=29be936c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_29be936c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./Resources/js/src/mixins/DetailPage.js":
/*!***********************************************!*\
  !*** ./Resources/js/src/mixins/DetailPage.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      fields: [],
      loading: true
    };
  },
  created: function created() {
    var _this = this;

    this.$http.post("".concat(window.config.path_prefix, "/api/get-model-fields"), {
      model: this.model,
      module: this.module
    }).then(function (_ref) {
      var data = _ref.data;
      _this.fields = data.data;
    });
  },
  methods: {
    getRelation: function getRelation(relation) {
      return this.__(Iracode.getByDotNotation(this.details, relation, "-"));
    },
    dateFormat: function dateFormat(field) {
      var localedParam = "".concat(field, "_").concat(window.Iracode.$i18n.locale);
      if (!this.details[localedParam]) return this.details[field];
      return this.details[localedParam];
    },
    populateFormFields: function populateFormFields(data) {
      this.details = data;
    },
    radioFormat: function radioFormat(field) {
      var definedField = this.fields[field];
      var value = this.details[field];
      value = typeof value == "boolean" ? +value : value;

      if (definedField && definedField.options && definedField.options.length) {
        return definedField.options[value] ? this.__(definedField.options[value]) : this.__(value);
      }

      return this.__(value);
    },
    checkboxFormat: function checkboxFormat() {},
    selectFormat: function selectFormat(field) {
      var definedField = this.fields[field];
      var value = this.details[field];
      value = typeof value == "boolean" ? +value : value;

      if (definedField && definedField.options && definedField.options.length) {
        return definedField.options[value] ? this.__(definedField.options[value]) : this.__(value);
      }

      return this.__(value);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_DetailPage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/mixins/DetailPage */ "./Resources/js/src/mixins/DetailPage.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

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
  components: {},
  mixins: [_mixins_DetailPage__WEBPACK_IMPORTED_MODULE_1__["default"]],
  data: function data() {
    return {
      details: {
        name: "",
        created_at: "",
        updated_at: ""
      },
      formTypes: {
        name: "text",
        created_at: "text",
        updated_at: "text"
      },
      module: "User",
      model: "ComplexCaseCategory"
    };
  },
  props: {//
  },
  computed: {//
  },
  created: function created() {
    var _this = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      var _yield$_this$$http$ge, response, data;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return _this.$http.get("/user/api/complex_case_categories/".concat(_this.$route.params.id));

            case 2:
              _yield$_this$$http$ge = _context.sent;
              response = _yield$_this$$http$ge.data;

              if (response.success) {
                data = response.data;

                _this.$store.dispatch("setCurrentResource", data);

                _this.populateFormFields(data);
              }

              _this.loading = false;

            case 6:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  },
  mounted: function mounted() {//
  },
  methods: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/complex_case_categories/Detail.vue?vue&type=template&id=29be936c& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("loading-view", { attrs: { loading: _vm.loading } }, [
    _c("div", { staticClass: "vx-row" }, [
      _c(
        "div",
        { staticClass: "vx-col w-full" },
        [
          _c(
            "vx-card",
            {
              staticClass: "mb-base",
              scopedSlots: _vm._u([
                {
                  key: "actions",
                  fn: function() {
                    return [
                      _c(
                        "vs-button",
                        {
                          attrs: {
                            color: "primary",
                            to: "/user/complex_case_categories",
                            type: "filled"
                          }
                        },
                        [_vm._v("Back")]
                      )
                    ]
                  },
                  proxy: true
                }
              ])
            },
            [
              _vm._v(" "),
              _c("div", { staticClass: "vx-row mb-6" }, [
                _c("div", { staticClass: "vx-col w-1/2" }, [
                  _c("div", { staticClass: "row flex" }, [
                    _c(
                      "div",
                      {
                        staticClass:
                          "vx-col w-1/4 pr-5 flex justify-end items-center "
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(_vm._s(_vm.__("Name")))
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.name) +
                          "\n                            "
                      )
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "vx-col w-1/2" }, [
                  _c("div", { staticClass: "row flex" }, [
                    _c(
                      "div",
                      {
                        staticClass:
                          "vx-col w-1/4 pr-5 flex justify-end items-center "
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("Created At")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.dateFormat("created_at")) +
                          "\n                            "
                      )
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "vx-row mb-6" }, [
                _c("div", { staticClass: "vx-col w-1/2" }, [
                  _c("div", { staticClass: "row flex" }, [
                    _c(
                      "div",
                      {
                        staticClass:
                          "vx-col w-1/4 pr-5 flex justify-end items-center "
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("Updated At")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.dateFormat("updated_at")) +
                          "\n                            "
                      )
                    ])
                  ])
                ])
              ])
            ]
          )
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);