(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[47],{

/***/ "../Admin/Resources/js/ct_cases/Detail.vue":
/*!*************************************************!*\
  !*** ../Admin/Resources/js/ct_cases/Detail.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Detail.vue?vue&type=template&id=db1a0a86& */ "../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86&");
/* harmony import */ var _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Detail.vue?vue&type=script&lang=js& */ "../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "Admin/Resources/js/ct_cases/Detail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86&":
/*!********************************************************************************!*\
  !*** ../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Detail.vue?vue&type=template&id=db1a0a86& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Detail_vue_vue_type_template_id_db1a0a86___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mixins_DetailPage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/mixins/DetailPage */ "./Resources/js/src/mixins/DetailPage.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    var _this = this;

    return {
      uploadModalActive: false,
      form: {
        result_file: ""
      },
      uploadServer: {
        url: "/admin/api/ct_cases/".concat(this.$route.params.id),
        // timeout: 7000,
        load: function load(source, _load, error, progress, abort, headers) {
          var myRequest = new Request(source);
          fetch(myRequest).then(function (response) {
            response.blob().then(function (myBlob) {
              _load(myBlob);
            });
          });
        },
        process: {
          url: '/upload_result',
          method: 'POST',
          headers: {
            "Authorization": "Bearer ".concat(this.$store.state.auth.accessToken),
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
          },
          withCredentials: false,
          onload: function onload(response) {
            if (_typeof(response) != "object") response = JSON.parse(response);
            _this.form[response.field_name] = response.key;
            _this.uploadModalActive = false;
            Iracode.success(_this.__("Result uploaded successfully"));
            return response.key;
          },
          onerror: function onerror(response) {
            return response.data;
          },
          ondata: function ondata(formData) {
            formData.append('model', _this.model);

            if (_this.$route.params.id) {
              formData.append('model_id', _this.$route.params.id);
            }

            return formData;
          }
        },
        revert: 'revert',
        restore: 'restore',
        fetch: 'fetch'
      },
      details: {
        ct_file: "",
        result_file: "",
        created_at: "",
        updated_at: "",
        "patient.name": "",
        "patient.age": "",
        "patient.hospital": "",
        patient: ""
      },
      formTypes: {
        ct_file: "text",
        result_file: "text",
        created_at: "text",
        updated_at: "text",
        "patient.name": "text",
        "patient.age": "text",
        "patient.hospital": "text",
        patient: "text"
      },
      module: "User",
      model: "CtCase"
    };
  },
  props: {//
  },
  computed: {
    Iracode: function Iracode() {
      return window.Iracode;
    }
  },
  created: function created() {
    var _this2 = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      var _yield$_this2$$http$g, response, data;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return _this2.$http.get("/user/api/ct_cases/".concat(_this2.$route.params.id));

            case 2:
              _yield$_this2$$http$g = _context.sent;
              response = _yield$_this2$$http$g.data;

              if (response.success) {
                data = response.data;

                _this2.$store.dispatch("setCurrentResource", data);

                _this2.populateFormFields(data);
              }

              _this2.loading = false;

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../Admin/Resources/js/ct_cases/Detail.vue?vue&type=template&id=db1a0a86& ***!
  \**************************************************************************************************************************************************************************************************************/
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
    _c(
      "div",
      { staticClass: "vx-row" },
      [
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
                              to: "/user/ct_cases",
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
                            _vm._v(_vm._s(_vm.__("Ct File")))
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "vx-col w-3/4" }, [
                        _vm.details.ct_file
                          ? _c(
                              "a",
                              {
                                attrs: {
                                  href: _vm.url(_vm.details.ct_file),
                                  download: _vm.Iracode.basename(
                                    _vm.details.ct_file
                                  )
                                }
                              },
                              [
                                _vm._v(
                                  _vm._s(
                                    _vm.Iracode.basename(_vm.details.ct_file)
                                  )
                                )
                              ]
                            )
                          : _c("p", [
                              _vm._v(
                                "\n                                    " +
                                  _vm._s(_vm.__("No file uploaded yet")) +
                                  "\n                                "
                              )
                            ])
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
                                _vm._s(_vm.__("Result File")) +
                                "\n                                "
                            )
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "vx-col w-3/4 flex" },
                        [
                          _vm.details.result_file
                            ? _c(
                                "a",
                                {
                                  attrs: {
                                    href: _vm.url(_vm.details.result_file),
                                    download: _vm.Iracode.basename(
                                      _vm.details.result_file
                                    )
                                  }
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      _vm.Iracode.basename(
                                        _vm.details.result_file
                                      )
                                    )
                                  )
                                ]
                              )
                            : _c("p", [
                                _vm._v(
                                  "\n                                    " +
                                    _vm._s(_vm.__("No file uploaded yet")) +
                                    "\n\n                                "
                                )
                              ]),
                          _vm._v(" "),
                          _c(
                            "vs-button",
                            {
                              attrs: { color: "primary", size: "small" },
                              on: {
                                click: function($event) {
                                  _vm.uploadModalActive = true
                                }
                              }
                            },
                            [
                              _vm._v(
                                "\n                                        " +
                                  _vm._s(_vm.__("Upload result")) +
                                  "\n                                    "
                              )
                            ]
                          )
                        ],
                        1
                      )
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
                            _vm._v(_vm._s(_vm.__("Patient")))
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
                            _vm._v(_vm._s(_vm.__("Age")))
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "vx-col w-3/4" }, [
                        _vm._v(
                          "\n                                " +
                            _vm._s(_vm.details.patient.age) +
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
                                _vm._s(_vm.__("Hospital")) +
                                "\n                                "
                            )
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c("div", { staticClass: "vx-col w-3/4" }, [
                        _vm._v(
                          "\n                                " +
                            _vm._s(_vm.details.patient.hospital) +
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
        ),
        _vm._v(" "),
        _c(
          "vs-popup",
          {
            staticClass: "holamundo",
            attrs: {
              title: _vm.__("Upload result"),
              active: _vm.uploadModalActive
            },
            on: {
              "update:active": function($event) {
                _vm.uploadModalActive = $event
              }
            }
          },
          [
            _c("filepond", {
              attrs: {
                imageResizeMode: "cover",
                name: "result_file",
                "allow-multiple": false,
                server: _vm.uploadServer
              }
            })
          ],
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);