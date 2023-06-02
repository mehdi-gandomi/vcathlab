(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[89],{

/***/ "../User/Resources/js/body_compositions/Update.vue":
/*!*********************************************************!*\
  !*** ../User/Resources/js/body_compositions/Update.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Update.vue?vue&type=template&id=3c467c78& */ "../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78&");
/* harmony import */ var _Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Update.vue?vue&type=script&lang=js& */ "../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "User/Resources/js/body_compositions/Update.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Update.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78&":
/*!****************************************************************************************!*\
  !*** ../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Update.vue?vue&type=template&id=3c467c78& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_3c467c78___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./Resources/js/src/mixins/UpdatePage.js":
/*!***********************************************!*\
  !*** ./Resources/js/src/mixins/UpdatePage.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

/* harmony default export */ __webpack_exports__["default"] = ({
  created: function created() {
    var _this = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      var key, _yield$_this$$http$ge, data;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.t0 = _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.keys(_this.inputs);

            case 1:
              if ((_context.t1 = _context.t0()).done) {
                _context.next = 12;
                break;
              }

              key = _context.t1.value;

              if (!(_this.inputs[key].field_type === "relation")) {
                _context.next = 10;
                break;
              }

              console.log(_this.inputs[key]);
              _context.next = 7;
              return _this.$http.get(_this.inputs[key].searchUrl);

            case 7:
              _yield$_this$$http$ge = _context.sent;
              data = _yield$_this$$http$ge.data;

              if (data.success) {
                _this.inputs[key].options = data.data.items;
              } // if(this.inputs[key].options.length){
              //     this.form[key]=this.inputs[key].options[0].id;
              //     this.inputs[key].selected=this.inputs[key].options[0];
              // }


            case 10:
              _context.next = 1;
              break;

            case 12:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  },
  methods: {
    populateFormFields: function populateFormFields(data) {
      var _this2 = this;

      var newFormData = {};

      var form = _objectSpread({}, this.form);

      console.log("populating", form, data);

      var _loop = function _loop(key) {
        if (_this2.inputs[key]) {
          if (_this2.inputs[key].field_type == "relation") {
            newFormData[key] = data[key] !== undefined ? data[key] : "";
            console.log(newFormData[key]);

            var index = _this2.inputs[key].options.findIndex(function (op) {
              return op.id == data[key];
            });

            console.log("district", index, data[key], _this2.inputs[key].options);
            if (index > -1) _this2.inputs[key].selected = _this2.inputs[key].options[index];
          } else if (_this2.inputs[key].field_type == "select") {
            newFormData[key] = data[key] !== undefined ? data[key] : "";

            var _index = _this2.inputs[key].options.findIndex(function (op) {
              return op.value == data[key];
            });

            if (_index > -1) _this2.inputs[key].selected = _this2.inputs[key].options[_index];
          } else if (["filepond", "filepond_image"].includes(_this2.inputs[key].field_type)) {
            if (_this2.inputs[key].files && Array.isArray(_this2.inputs[key].files)) {
              if (Array.isArray(data[key])) {
                console.log(data[key]);
                data[key].forEach(function (file) {
                  _this2.inputs[key].files.push({
                    source: _this2.serverUrl(file),
                    // type:"local",
                    // load: false,
                    options: {
                      type: 'local',
                      load: false // ← File data will NOT be load

                    }
                  });
                });
              } else {
                _this2.inputs[key].files.push({
                  source: _this2.serverUrl(data[key]),
                  // type:"local",
                  // load: false,
                  options: {
                    type: 'local',
                    load: false // ← File data will NOT be load

                  }
                });
              }
            }

            if (Array.isArray(form[key])) {
              newFormData[key] = data[key] !== undefined ? !Array.isArray(data[key]) ? [] : data[key] : "";
            } else {
              newFormData[key] = data[key] !== undefined ? data[key] : "";
            }
          } else if (_this2.inputs[key].field_type != "password") {
            newFormData[key] = data[key] !== undefined ? data[key] : "";
          }
        }
      };

      for (var key in form) {
        _loop(key);
      }

      this.form.populate(newFormData);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/body_compositions/Update.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Form__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/Form */ "./Resources/js/src/Form.js");
/* harmony import */ var _mixins_HasForm__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/mixins/HasForm */ "./Resources/js/src/mixins/HasForm.js");
/* harmony import */ var _mixins_UpdatePage__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/mixins/UpdatePage */ "./Resources/js/src/mixins/UpdatePage.js");


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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  mixins: [_mixins_HasForm__WEBPACK_IMPORTED_MODULE_2__["default"], _mixins_UpdatePage__WEBPACK_IMPORTED_MODULE_3__["default"]],
  data: function data() {
    return {
      form: new _Form__WEBPACK_IMPORTED_MODULE_1__["default"]({
        Age: "",
        Sex: "",
        Waist: "",
        SMM: "",
        VFP: "",
        Height: "",
        Weight: "",
        Hip: "",
        BFMP: "",
        user_id: "",
        patient_id: ""
      }),
      model: "Modules\\User\\Models\\BodyComposition",
      inputs: {
        Age: {
          type: "vs-input",
          field_type: "text"
        },
        Sex: {
          type: "vs-radio",
          field_type: "radio"
        },
        Waist: {
          type: "vs-input",
          field_type: "text"
        },
        SMM: {
          type: "vs-input",
          field_type: "text"
        },
        VFP: {
          type: "vs-input",
          field_type: "text"
        },
        Height: {
          type: "vs-input",
          field_type: "text"
        },
        Weight: {
          type: "vs-input",
          field_type: "text"
        },
        Hip: {
          type: "vs-input",
          field_type: "text"
        },
        BFMP: {
          type: "vs-input",
          field_type: "text"
        },
        user_id: {
          field_type: "relation",
          foreign_key: "user_id",
          relation_name: "user",
          options: [],
          selected: {},
          searchUrl: "/panel/api/users",
          titleField: "email"
        },
        patient_id: {
          field_type: "relation",
          foreign_key: "patient_id",
          relation_name: "patient",
          options: [],
          selected: {},
          searchUrl: "/user/api/patients",
          titleField: "name"
        }
      }
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
              return _this.$http.get("/user/api/body_compositions/".concat(_this.$route.params.id));

            case 2:
              _yield$_this$$http$ge = _context.sent;
              response = _yield$_this$$http$ge.data;

              if (response.success) {
                data = response.data;

                _this.$store.dispatch("setCurrentResource", data);

                _this.populateFormFields(data);
              }

            case 5:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  },
  mounted: function mounted() {//
  },
  methods: {
    onSubmit: function onSubmit(action) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _context2.next = 2;
                return _this2.form.put("/user/api/body_compositions/".concat(_this2.$route.params.id));

              case 2:
                data = _context2.sent;

                if (data.success) {
                  Iracode.success(_this2.__("Bodycomposition Updated Successfully"));
                }

                if (action == "close") _this2.$router.push("/user/body_compositions");else _this2.form.reset();

              case 5:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../User/Resources/js/body_compositions/Update.vue?vue&type=template&id=3c467c78& ***!
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
  return _c(
    "div",
    { staticClass: "mb-base" },
    [
      _c(
        "vx-card",
        {
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
                    [_vm._v(_vm._s(_vm.__("Back")))]
                  )
                ]
              },
              proxy: true
            }
          ])
        },
        [
          _vm._v(" "),
          _c(
            "form",
            { on: { submit: _vm.onSubmit } },
            [
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("patient")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(
                                "v-select",
                                {
                                  staticStyle: { width: "100%" },
                                  attrs: {
                                    dir: _vm.$vs.rtl ? "rtl" : "ltr",
                                    value: _vm.inputs.patient_id.selected,
                                    label: "name",
                                    filterable: false,
                                    options: _vm.inputs.patient_id.options
                                  },
                                  on: {
                                    input: function(op) {
                                      return _vm.onRelationSelect(
                                        "patient_id",
                                        op
                                      )
                                    },
                                    search: function(search, loading) {
                                      return _vm.onRelationSearch(
                                        "patient_id",
                                        search,
                                        loading
                                      )
                                    }
                                  }
                                },
                                [
                                  _c("template", { slot: "no-options" }, [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(_vm.__("Type to search")) +
                                        "\n                                "
                                    )
                                  ])
                                ],
                                2
                              )
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("user")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(
                                "v-select",
                                {
                                  staticStyle: { width: "100%" },
                                  attrs: {
                                    dir: _vm.$vs.rtl ? "rtl" : "ltr",
                                    value: _vm.inputs.user_id.selected,
                                    label: "email",
                                    filterable: false,
                                    options: _vm.inputs.user_id.options
                                  },
                                  on: {
                                    input: function(op) {
                                      return _vm.onRelationSelect("user_id", op)
                                    },
                                    search: function(search, loading) {
                                      return _vm.onRelationSearch(
                                        "user_id",
                                        search,
                                        loading
                                      )
                                    }
                                  }
                                },
                                [
                                  _c("template", { slot: "no-options" }, [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(_vm.__("Type to search")) +
                                        "\n                                "
                                    )
                                  ])
                                ],
                                2
                              )
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [
                              _c("span", [_vm._v(_vm._s(_vm.__("Age")))]),
                              _vm._v(" "),
                              _c("span", { staticClass: "ml-1 text-red" }, [
                                _vm._v("*")
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Age.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Age"),
                                  "danger-text": _vm.validationError("Age"),
                                  name: "Age",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.Age,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Age", $$v)
                                  },
                                  expression: "form.Age"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [
                              _c("span", [_vm._v(_vm._s(_vm.__("Sex")))]),
                              _vm._v(" "),
                              _c("span", { staticClass: "ml-1 text-red" }, [
                                _vm._v("*")
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Sex.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Sex"),
                                  "danger-text": _vm.validationError("Sex"),
                                  name: "Sex",
                                  type: "radio"
                                },
                                model: {
                                  value: _vm.form.Sex,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Sex", $$v)
                                  },
                                  expression: "form.Sex"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("Waist")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Waist.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Waist"),
                                  "danger-text": _vm.validationError("Waist"),
                                  name: "Waist",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.Waist,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Waist", $$v)
                                  },
                                  expression: "form.Waist"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("S M M")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.SMM.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("SMM"),
                                  "danger-text": _vm.validationError("SMM"),
                                  name: "SMM",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.SMM,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "SMM", $$v)
                                  },
                                  expression: "form.SMM"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("V F P")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.VFP.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("VFP"),
                                  "danger-text": _vm.validationError("VFP"),
                                  name: "VFP",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.VFP,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "VFP", $$v)
                                  },
                                  expression: "form.VFP"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("Height")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Height.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Height"),
                                  "danger-text": _vm.validationError("Height"),
                                  name: "Height",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.Height,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Height", $$v)
                                  },
                                  expression: "form.Height"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("Weight")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Weight.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Weight"),
                                  "danger-text": _vm.validationError("Weight"),
                                  name: "Weight",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.Weight,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Weight", $$v)
                                  },
                                  expression: "form.Weight"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("Hip")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.Hip.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("Hip"),
                                  "danger-text": _vm.validationError("Hip"),
                                  name: "Hip",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.Hip,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "Hip", $$v)
                                  },
                                  expression: "form.Hip"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "vs-row",
                {
                  staticClass: "mb-6",
                  attrs: { "vs-type": "flex", "vs-w": "12" }
                },
                [
                  _c(
                    "vs-col",
                    {
                      attrs: {
                        "vs-type": "flex",
                        "vs-align": "center",
                        "vs-lg": "6"
                      }
                    },
                    [
                      _c(
                        "vs-row",
                        { attrs: { "vs-type": "flex", "vs-w": "12" } },
                        [
                          _c(
                            "vs-col",
                            {
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [_c("span", [_vm._v(_vm._s(_vm.__("B F M P")))])]
                          ),
                          _vm._v(" "),
                          _c(
                            "vs-col",
                            {
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "9"
                              }
                            },
                            [
                              _c(_vm.inputs.BFMP.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("BFMP"),
                                  "danger-text": _vm.validationError("BFMP"),
                                  name: "BFMP",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.BFMP,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "BFMP", $$v)
                                  },
                                  expression: "form.BFMP"
                                }
                              })
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c("vs-row", {
                staticClass: "mb-6",
                attrs: { "vs-type": "flex", "vs-w": "12" }
              }),
              _vm._v(" "),
              _c("div", { staticClass: "flex justify-end mt-16" }, [
                _c(
                  "div",
                  { staticClass: "flex" },
                  [
                    _c(
                      "vs-button",
                      {
                        staticClass: "mr-3 mb-2",
                        attrs: { color: "success" },
                        on: {
                          click: function() {
                            return _vm.onSubmit("close")
                          }
                        }
                      },
                      [_vm._v(_vm._s(_vm.__("Save")))]
                    ),
                    _vm._v(" "),
                    _c(
                      "vs-button",
                      {
                        staticClass: "mb-2",
                        attrs: { color: "warning" },
                        on: {
                          click: function($event) {
                            return _vm.form.reset()
                          }
                        }
                      },
                      [_vm._v(_vm._s(_vm.__("Clear")))]
                    )
                  ],
                  1
                )
              ])
            ],
            1
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);