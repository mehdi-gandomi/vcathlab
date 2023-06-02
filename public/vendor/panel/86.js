(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[86],{

/***/ "../Admin/Resources/js/physicians/Update.vue":
/*!***************************************************!*\
  !*** ../Admin/Resources/js/physicians/Update.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Update.vue?vue&type=template&id=bfd4c0be& */ "../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be&");
/* harmony import */ var _Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Update.vue?vue&type=script&lang=js& */ "../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "Admin/Resources/js/physicians/Update.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Update.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be&":
/*!**********************************************************************************!*\
  !*** ../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./Update.vue?vue&type=template&id=bfd4c0be& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_Update_vue_vue_type_template_id_bfd4c0be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../Admin/Resources/js/physicians/Update.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
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



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {},
  mixins: [_mixins_HasForm__WEBPACK_IMPORTED_MODULE_2__["default"], _mixins_UpdatePage__WEBPACK_IMPORTED_MODULE_3__["default"]],
  data: function data() {
    return {
      form: new _Form__WEBPACK_IMPORTED_MODULE_1__["default"]({
        first_name: "",
        last_name: "",
        profession: "1",
        specialty: "1",
        hostpital: "",
        cover: "",
        avatar: ""
      }),
      model: "Modules\\Admin\\Models\\Physician",
      inputs: {
        first_name: {
          type: "vs-input",
          field_type: "text"
        },
        last_name: {
          type: "vs-input",
          field_type: "text"
        },
        profession: {
          type: "v-select",
          field_type: "select",
          options: [{
            label: "Fellow",
            value: "1"
          }, {
            label: "Medical student",
            value: "2"
          }, {
            label: "Physician",
            value: "3"
          }, {
            label: "Physician assistant",
            value: "4"
          }, {
            label: "Resident",
            value: "5"
          }, {
            label: "Other",
            value: "6"
          }],
          selected: {}
        },
        specialty: {
          type: "v-select",
          field_type: "select",
          options: [{
            label: "General cardiologist",
            value: "1"
          }, {
            label: "Interventional cardiologist",
            value: "2"
          }, {
            label: "Interventional radilogist",
            value: "3"
          }, {
            label: "Interventionalelectrophysiologist",
            value: "4"
          }, {
            label: "Other",
            value: "5"
          }],
          selected: {}
        },
        hostpital: {
          type: "vs-input",
          field_type: "text"
        },
        cover: {
          type: "filepond",
          field_type: "filepond_image",
          files: [],
          filepond_options: {
            "label-idle": "Drag &amp; Drop your files",
            "allow-multiple": Iracode.toBool(0),
            "accepted-file-types": "image/jpeg, image/png",
            "instant-upload": Iracode.toBool(1)
          }
        },
        avatar: {
          type: "filepond",
          field_type: "filepond_image",
          files: [],
          filepond_options: {
            "label-idle": "Drag &amp; Drop your files",
            "allow-multiple": Iracode.toBool(0),
            "accepted-file-types": "image/jpeg, image/png",
            "instant-upload": Iracode.toBool(1)
          }
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
              return _this.$http.get("/admin/api/physicians/".concat(_this.$route.params.id));

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
                return _this2.form.put("/admin/api/physicians/".concat(_this2.$route.params.id));

              case 2:
                data = _context2.sent;

                if (data.success) {
                  Iracode.success(_this2.__("Physician Updated Successfully"));
                }

                if (action == "close") _this2.$router.push("/admin/physicians");else _this2.form.reset();

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../Admin/Resources/js/physicians/Update.vue?vue&type=template&id=bfd4c0be& ***!
  \****************************************************************************************************************************************************************************************************************/
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
                        to: "/admin/physicians",
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
                              staticClass: "justify-end pr-5",
                              attrs: {
                                "vs-type": "flex",
                                "vs-align": "center",
                                "vs-lg": "3"
                              }
                            },
                            [
                              _c("span", [
                                _vm._v(_vm._s(_vm.__("First Name")))
                              ]),
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
                              _c(_vm.inputs.first_name.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("first_name"),
                                  "danger-text": _vm.validationError(
                                    "first_name"
                                  ),
                                  name: "first_name",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.first_name,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "first_name", $$v)
                                  },
                                  expression: "form.first_name"
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
                              _c("span", [_vm._v(_vm._s(_vm.__("Last Name")))]),
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
                              _c(_vm.inputs.last_name.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("last_name"),
                                  "danger-text": _vm.validationError(
                                    "last_name"
                                  ),
                                  name: "last_name",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.last_name,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "last_name", $$v)
                                  },
                                  expression: "form.last_name"
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
                            [_c("span", [_vm._v(_vm._s(_vm.__("Profession")))])]
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
                              _c(_vm.inputs.profession.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  value: _vm.inputs.profession.selected,
                                  danger: _vm.hasValidationError("profession"),
                                  "danger-text": _vm.validationError(
                                    "profession"
                                  ),
                                  name: "profession",
                                  type: "select",
                                  options: _vm.inputs.profession.options,
                                  dir: _vm.$vs.rtl ? "rtl" : "ltr"
                                },
                                on: {
                                  input: function(op) {
                                    return _vm.onSelect("profession", op)
                                  }
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
                            [_c("span", [_vm._v(_vm._s(_vm.__("Specialty")))])]
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
                              _c(_vm.inputs.specialty.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  value: _vm.inputs.specialty.selected,
                                  danger: _vm.hasValidationError("specialty"),
                                  "danger-text": _vm.validationError(
                                    "specialty"
                                  ),
                                  name: "specialty",
                                  type: "select",
                                  options: _vm.inputs.specialty.options,
                                  dir: _vm.$vs.rtl ? "rtl" : "ltr"
                                },
                                on: {
                                  input: function(op) {
                                    return _vm.onSelect("specialty", op)
                                  }
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
                            [_c("span", [_vm._v(_vm._s(_vm.__("Hospital")))])]
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
                              _c(_vm.inputs.hostpital.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  danger: _vm.hasValidationError("hostpital"),
                                  "danger-text": _vm.validationError(
                                    "hostpital"
                                  ),
                                  name: "hostpital",
                                  type: "text"
                                },
                                model: {
                                  value: _vm.form.hostpital,
                                  callback: function($$v) {
                                    _vm.$set(_vm.form, "hostpital", $$v)
                                  },
                                  expression: "form.hostpital"
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
                            [_c("span", [_vm._v(_vm._s(_vm.__("Cover")))])]
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
                              _c(_vm.inputs.cover.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  imageResizeMode: "cover",
                                  danger: _vm.hasValidationError("cover"),
                                  "danger-text": _vm.validationError("cover"),
                                  name: "cover",
                                  "label-idle":
                                    _vm.inputs.cover.filepond_options[
                                      "label-idle"
                                    ],
                                  "allow-multiple":
                                    _vm.inputs.cover.filepond_options[
                                      "allow-multiple"
                                    ],
                                  "accepted-file-types":
                                    _vm.inputs.cover.filepond_options[
                                      "accepted-file-types"
                                    ],
                                  "instant-upload":
                                    _vm.inputs.cover.filepond_options[
                                      "instant-upload"
                                    ],
                                  files: _vm.inputs.cover.files,
                                  server: _vm.uploadServer
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
                              _c("span", [_vm._v(_vm._s(_vm.__("Avatar")))]),
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
                              _c(_vm.inputs.avatar.type, {
                                tag: "component",
                                staticClass: "w-full",
                                attrs: {
                                  imageResizeMode: "cover",
                                  danger: _vm.hasValidationError("avatar"),
                                  "danger-text": _vm.validationError("avatar"),
                                  name: "avatar",
                                  "label-idle":
                                    _vm.inputs.avatar.filepond_options[
                                      "label-idle"
                                    ],
                                  "allow-multiple":
                                    _vm.inputs.avatar.filepond_options[
                                      "allow-multiple"
                                    ],
                                  "accepted-file-types":
                                    _vm.inputs.avatar.filepond_options[
                                      "accepted-file-types"
                                    ],
                                  "instant-upload":
                                    _vm.inputs.avatar.filepond_options[
                                      "instant-upload"
                                    ],
                                  files: _vm.inputs.avatar.files,
                                  server: _vm.uploadServer
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