(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./Resources/js/src/Form.js":
/*!**********************************!*\
  !*** ./Resources/js/src/Form.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! form-backend-validation */ "./node_modules/form-backend-validation/dist/index.js");
/* harmony import */ var form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(form_backend_validation__WEBPACK_IMPORTED_MODULE_0__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CustomForm = function CustomForm(fields) {
  var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
  _classCallCheck(this, CustomForm);
  return new form_backend_validation__WEBPACK_IMPORTED_MODULE_0___default.a(fields, {
    http: window.Iracode.getHttp()
  });
};
/* harmony default export */ __webpack_exports__["default"] = (CustomForm);

/***/ }),

/***/ "./Resources/js/src/mixins/HasForm.js":
/*!********************************************!*\
  !*** ./Resources/js/src/mixins/HasForm.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? Object(arguments[i]) : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys.push.apply(ownKeys, Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(t) { var i = _toPrimitive(t, "string"); return "symbol" == _typeof(i) ? i : String(i); }
function _toPrimitive(t, r) { if ("object" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || "default"); if ("object" != _typeof(i)) return i; throw new TypeError("@@toPrimitive must return a primitive value."); } return ("string" === r ? String : Number)(t); }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    var _this = this;
    return {
      uploadServer: {
        url: window.config.uploadBasePath,
        timeout: 36000000,
        load: function load(source, _load, error, progress, abort, headers) {
          if (source.indexOf("/null") > -1) {
            console.log("source", source);
            abort();
          }
          ;
          var myRequest = new Request(source);
          fetch(myRequest).then(function (response) {
            response.blob().then(function (myBlob) {
              _load(myBlob);
            });
          });
        },
        process: {
          url: '/process',
          method: 'POST',
          headers: {
            "Authorization": "Bearer ".concat(this.$store.state.auth.accessToken),
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
          },
          withCredentials: false,
          onload: function onload(response) {
            if (_typeof(response) != "object") response = JSON.parse(response);
            console.log(_this.inputs[response.field_name], response.field_name);
            if (_this.inputs[response.field_name]['filepond_options']['allow-multiple']) {
              _this.form[response.field_name].push(response.key);
            } else {
              _this.form[response.field_name] = response.key;
            }
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
      }
    };
  },
  methods: {
    getRelationLabel: function getRelationLabel() {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }
      console.log(this, args);
      // return op.title;
    },
    onRelationSelect: function onRelationSelect(foreignKey, option) {
      var fieldKey = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "id";
      this.inputs[foreignKey].selected = option;
      this.form[foreignKey] = option[fieldKey];
    },
    handleFilePondInit: function handleFilePondInit() {
      // FilePond instance methods are available on `this.$refs.pond`
      /* eslint-disable */
      console.log('FilePond has initialized');
    },
    onSelect: function onSelect(field, option) {
      this.inputs[field].selected = option;
      this.form[field] = option.value;
    },
    onRelationSearch: function () {
      var _onRelationSearch = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(foreignKey, search, loading) {
        var input, params, _yield$this$$http$get, data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                if (!(search == "")) {
                  _context.next = 2;
                  break;
                }
                return _context.abrupt("return");
              case 2:
                loading(true);
                input = this.inputs[foreignKey];
                params = {};
                if (input) {
                  params["filter[".concat(input.titleField, "]")] = search;
                }
                _context.next = 8;
                return this.$http.get(this.inputs[foreignKey].searchUrl, {
                  params: params
                });
              case 8:
                _yield$this$$http$get = _context.sent;
                data = _yield$this$$http$get.data;
                if (!data.success) {
                  _context.next = 13;
                  break;
                }
                this.inputs[foreignKey].options = data.data.items;
                return _context.abrupt("return", loading(false));
              case 13:
                this.inputs[foreignKey].options = [];
              case 14:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));
      function onRelationSearch(_x, _x2, _x3) {
        return _onRelationSearch.apply(this, arguments);
      }
      return onRelationSearch;
    }(),
    hasValidationError: function hasValidationError(name) {
      return this.form.errors && this.form.errors.has(name) ? true : undefined;
    },
    validationError: function validationError(name) {
      return this.form.errors ? this.form.errors.first(name) : undefined;
    },
    onSelectTableSearch: function () {
      var _onSelectTableSearch = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(field, search) {
        var _yield$this$$http$pos, data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (!search.length) {
                  _context2.next = 6;
                  break;
                }
                _context2.next = 3;
                return this.$http.post("".concat(window.config.path_prefix, "/api/get_select_table"), _objectSpread({}, this.inputs[field].select_table_options, {
                  search: search
                }));
              case 3:
                _yield$this$$http$pos = _context2.sent;
                data = _yield$this$$http$pos.data;
                this.inputs[field].options = data.data;
              case 6:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this);
      }));
      function onSelectTableSearch(_x4, _x5) {
        return _onSelectTableSearch.apply(this, arguments);
      }
      return onSelectTableSearch;
    }()
  },
  created: function () {
    var _created = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
      var key, _yield$this$$http$get2, data;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              console.log("before create called");
              _context3.t0 = _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.keys(this.inputs);
            case 2:
              if ((_context3.t1 = _context3.t0()).done) {
                _context3.next = 14;
                break;
              }
              key = _context3.t1.value;
              if (!(this.inputs[key].field_type === "relation")) {
                _context3.next = 12;
                break;
              }
              console.log(this.inputs[key]);
              _context3.next = 8;
              return this.$http.get(this.inputs[key].searchUrl);
            case 8:
              _yield$this$$http$get2 = _context3.sent;
              data = _yield$this$$http$get2.data;
              if (data.success) {
                this.inputs[key].options = data.data.items;
              }
              if (this.inputs[key].options.length) {
                if (!Array.isArray(this.inputs[key].selected)) {
                  this.form[key] = this.inputs[key].options[0].id;
                  this.inputs[key].selected = this.inputs[key].options[0];
                }
              }
            case 12:
              _context3.next = 2;
              break;
            case 14:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3, this);
    }));
    function created() {
      return _created.apply(this, arguments);
    }
    return created;
  }()
});

/***/ })

}]);