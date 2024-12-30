(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[55],{

/***/ "../User/Resources/js/body_compositions/Detail.vue":
/*!*********************************************************!*\
  !*** ../User/Resources/js/body_compositions/Detail.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Detail.vue?vue&type=template&id=10255800& */ "../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800&");
/* harmony import */ var _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Detail.vue?vue&type=script&lang=js& */ "../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "User/Resources/js/body_compositions/Detail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800&":
/*!****************************************************************************************!*\
  !*** ../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=template&id=10255800& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_10255800___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/body_compositions/Detail.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_DetailPage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/mixins/DetailPage */ "./Resources/js/src/mixins/DetailPage.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
    var _details;

    return {
      details: (_details = {
        Age: "",
        Sex: "",
        Waist: "",
        SMM: "",
        VFP: "",
        Height: "",
        Weight: "",
        Hip: "",
        BFMP: "",
        created_at: "",
        updated_at: "",
        user: "",
        patient: ""
      }, _defineProperty(_details, "user", {}), _defineProperty(_details, "patient", {}), _details),
      formTypes: {
        Age: "text",
        Sex: "text",
        Waist: "text",
        SMM: "text",
        VFP: "text",
        Height: "text",
        Weight: "text",
        Hip: "text",
        BFMP: "text",
        created_at: "text",
        updated_at: "text",
        user: "text",
        patient: "text"
      },
      module: "User",
      model: "BodyComposition"
    };
  },
  props: {//
  },
  methods: {
    download: function download(link, maceType) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                setTimeout( /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
                  var _yield$_this$$http$pu, data;

                  return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
                    while (1) {
                      switch (_context.prev = _context.next) {
                        case 0:
                          _context.prev = 0;
                          _context.next = 3;
                          return _this.$http.put("/user/api/mace_assesments/" + _this.details.id, _defineProperty({}, maceType, 1));

                        case 3:
                          _yield$_this$$http$pu = _context.sent;
                          data = _yield$_this$$http$pu.data;
                          console.log(data);
                          _context.next = 11;
                          break;

                        case 8:
                          _context.prev = 8;
                          _context.t0 = _context["catch"](0);
                          console.log(_context.t0);

                        case 11:
                          _context.prev = 11;
                          location.href = link;
                          return _context.finish(11);

                        case 14:
                        case "end":
                          return _context.stop();
                      }
                    }
                  }, _callee, null, [[0, 8, 11, 14]]);
                })), 500);

              case 1:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  },
  computed: {
    Iracode: function Iracode() {
      return window.Iracode;
    }
  },
  created: function created() {
    var _this2 = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
      var _yield$_this2$$http$g, response, data;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              _context3.next = 2;
              return _this2.$http.get("/user/api/body_compositions/".concat(_this2.$route.params.id));

            case 2:
              _yield$_this2$$http$g = _context3.sent;
              response = _yield$_this2$$http$g.data;

              if (response.success) {
                data = response.data;

                _this2.$store.dispatch("setCurrentResource", data);

                _this2.populateFormFields(data);
              }

              _this2.loading = false;

            case 6:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3);
    }))();
  },
  mounted: function mounted() {//
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/body_compositions/Detail.vue?vue&type=template&id=10255800& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
                            to: "/user/body_compositions",
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(_vm._s(_vm.__("Age")))
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.Age) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(_vm._s(_vm.__("Sex")))
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.radioFormat("Sex")) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("Waist")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.Waist) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("S M M")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.SMM) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("V F P")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.VFP) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("Height")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.Height) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("Weight")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.Weight) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(_vm._s(_vm.__("Hip")))
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.Hip) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("B F M P")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.BFMP) +
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
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
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
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
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "vx-col w-1/2" }, [
                  _c("div", { staticClass: "row flex" }, [
                    _c(
                      "div",
                      {
                        staticClass:
                          "vx-col w-1/4 pr-5 flex justify-end items-center"
                      },
                      [
                        _c("p", { staticClass: "font-semibold" }, [
                          _vm._v(
                            "\n                                    " +
                              _vm._s(_vm.__("patient")) +
                              "\n                                "
                          )
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "vx-col w-3/4" }, [
                      _vm._v(
                        "\n                                " +
                          _vm._s(_vm.details.patient.name) +
                          "\n                            "
                      )
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "vx-row mb-6" })
            ]
          )
        ],
        1
      )
    ]),
    _vm._v(" "),
    _c("div", { staticClass: "vx-row" }, [
      _c(
        "div",
        { staticClass: "vx-col w-full" },
        [
          _c("vx-card", { staticClass: "mb-base" }, [
            _c("div", [
              _vm.details.result && _vm.details.result.link
                ? _c(
                    "a",
                    {
                      key: _vm.downloadBtnKey,
                      staticClass:
                        "mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn",
                      staticStyle: { "font-size": "30px" },
                      attrs: { rel: "noopener", href: "javascript:void(0)" },
                      on: {
                        click: function($event) {
                          return _vm.download(
                            _vm.details.result.link,
                            "total_clicked"
                          )
                        }
                      }
                    },
                    [
                      _vm._v(
                        "\n                    " +
                          _vm._s(_vm.__("Export PDF")) +
                          "\n                "
                      )
                    ]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.details.result && _vm.details.result.word_link
                ? _c(
                    "a",
                    {
                      key: _vm.downloadBtnKey,
                      staticClass:
                        "mr-3 mb-2 vs-component vs-button vs-button-success vs-button-filled download-btn",
                      staticStyle: { "font-size": "30px" },
                      attrs: {
                        target: "_blank",
                        rel: "noopener",
                        href: _vm.details.result.word_link
                      }
                    },
                    [
                      _vm._v(
                        "\n                        " +
                          _vm._s(_vm.__("Export Word")) +
                          "\n                "
                      )
                    ]
                  )
                : _vm._e()
            ])
          ])
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