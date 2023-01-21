(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-10.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-10.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-10.jpg?c7eebd6b707086d0063fc288f3905042";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-11.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-11.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-11.jpg?1a620230b75dd161d37ad2d21948e9cb";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-15.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-15.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-15.jpg?f537955eba3fe0cedf2b60b653aa5a91";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-2.jpg":
/*!**********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-2.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-2.jpg?fc2135e130e396cfc30cec9b6e9861af";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-20.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-20.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-20.jpg?e8861d8caf03a6a986fd7a498fb18d87";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-23.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-23.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-23.jpg?f7dd6b8f2eed3d37465eed20cc6fc3dd";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-24.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-24.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-24.jpg?e9860ff62971f4dca6eec8ccadad35ad";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-25.jpg":
/*!***********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-25.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-25.jpg?eb6156c0ec9c829985c1b0a6e1ff2bc1";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-4.jpg":
/*!**********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-4.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-4.jpg?6a665e7ccedce6cfb58f17aafae574ef";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-5.jpg":
/*!**********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-5.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-5.jpg?99691e543d9e33cf745f6ac56f5800b8";

/***/ }),

/***/ "../Panel/Resources/assets/images/portrait/small/avatar-s-7.jpg":
/*!**********************************************************************!*\
  !*** ../Panel/Resources/assets/images/portrait/small/avatar-s-7.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/avatar-s-7.jpg?b00fd0f744875b2f52e7cdcb863246e9";

/***/ }),

/***/ "../Panel/Resources/js/src/auth/authService.js":
/*!*****************************************************!*\
  !*** ../Panel/Resources/js/src/auth/authService.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "../Panel/node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var events__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! events */ "./node_modules/events/events.js");
/* harmony import */ var events__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(events__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _store_store_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/store/store.js */ "../Panel/Resources/js/src/store/store.js");
/* harmony import */ var _axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/axios */ "../Panel/Resources/js/src/axios.js");
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }



 // 'loggedIn' is used in other parts of application. So, Don't forget to change there also

var localStorageKey = 'loggedIn';
var tokenExpiryKey = 'tokenExpiry';
var loginEvent = 'loginEvent';

var AuthService = /*#__PURE__*/function (_EventEmitter) {
  _inherits(AuthService, _EventEmitter);

  var _super = _createSuper(AuthService);

  function AuthService() {
    var _this;

    _classCallCheck(this, AuthService);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _defineProperty(_assertThisInitialized(_this), "idToken", null);

    _defineProperty(_assertThisInitialized(_this), "profile", null);

    _defineProperty(_assertThisInitialized(_this), "tokenExpiry", null);

    return _this;
  }

  _createClass(AuthService, [{
    key: "login",
    // Starts the user login flow
    value: function login(customState) {// webAuth.authorize({
      //     appState: customState
      // });
    } // Handles the callback request from Auth0

  }, {
    key: "handleAuthentication",
    value: function handleAuthentication(authResult) {
      var _this2 = this;

      return new Promise(function (resolve, reject) {
        console.log("local", authResult);
        _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("auth/SET_BEARER", authResult.accessToken);

        _this2.localLogin(authResult);

        resolve(authResult.idToken);
      });
    }
  }, {
    key: "handleSessionAuthentication",
    value: function () {
      var _handleSessionAuthentication = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var _this3 = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                return _context2.abrupt("return", new Promise( /*#__PURE__*/function () {
                  var _ref = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(resolve, reject) {
                    var _yield$axios$get, data;

                    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
                      while (1) {
                        switch (_context.prev = _context.next) {
                          case 0:
                            _context.next = 2;
                            return _axios__WEBPACK_IMPORTED_MODULE_3__["default"].get("".concat(window.config.path_prefix, "/api/get_user"));

                          case 2:
                            _yield$axios$get = _context.sent;
                            data = _yield$axios$get.data;
                            console.log(data);

                            if (data.ok) {
                              console.log(data.userData);
                              _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("UPDATE_USER_INFO", _objectSpread(_objectSpread({}, data.userData), {}, {
                                displayName: data.userData.name,
                                email: data.userData.email,
                                photoURL: data.userData.avatar_url ? data.userData.avatar_url : "/vendor/panel/assets/images/avatar-s-11.jpg",
                                // From Auth
                                status: "online" // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
                                // uid: this.profile.sub

                              }));

                              _this3.emit(loginEvent, {
                                loggedIn: true,
                                profile: data.userData,
                                state: {}
                              });

                              resolve();
                            }

                          case 6:
                          case "end":
                            return _context.stop();
                        }
                      }
                    }, _callee);
                  }));

                  return function (_x, _x2) {
                    return _ref.apply(this, arguments);
                  };
                }()));

              case 1:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }));

      function handleSessionAuthentication() {
        return _handleSessionAuthentication.apply(this, arguments);
      }

      return handleSessionAuthentication;
    }()
  }, {
    key: "localLogin",
    value: function localLogin(authResult) {
      this.idToken = authResult.idToken;
      this.profile = authResult.idTokenPayload; // console.log(this.profile);
      // return;
      // Convert the JWT expiry time from seconds to milliseconds

      this.tokenExpiry = new Date(this.profile.exp * 1000);
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("auth/SET_TOKEN_EXPIREY", this.tokenExpiry);
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("UPDATE_USER_INFO", {
        displayName: this.profile.name,
        email: this.profile.email,
        photoURL: "/assets/images/avatar-s-11.jpg",
        // From Auth
        status: "online" // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
        // uid: this.profile.sub

      });
      this.emit(loginEvent, {
        loggedIn: true,
        profile: authResult.idTokenPayload,
        state: authResult.appState || {}
      });
    }
  }, {
    key: "renewTokens",
    value: function renewTokens() {
      var _this4 = this;

      // reject can be used as parameter in promise for using reject
      return new Promise(function (resolve) {
        if (localStorage.getItem(localStorageKey) !== "true") {// return reject("Not logged in");
        }

        webAuth.checkSession({}, function (err, authResult) {
          if (err) {// reject(err);
          } else {
            _this4.localLogin(authResult);

            resolve(authResult);
          }
        });
      });
    }
  }, {
    key: "logOut",
    value: function logOut() {
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("UPDATE_USER_INFO", {});
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("auth/SET_BEARER", null);
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("auth/SET_TOKEN_EXPIREY", 0);
      _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("auth/SET_LOGIN_RESULT", null);
      localStorage.removeItem("vuex");
      this.idToken = null;
      this.tokenExpiry = null;
      this.profile = null;
      this.emit(loginEvent, {
        loggedIn: false
      });
    }
  }, {
    key: "isAuthenticated",
    value: function () {
      var _isAuthenticated = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var _this5 = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                return _context4.abrupt("return", new Promise( /*#__PURE__*/function () {
                  var _ref2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(resolve) {
                    var check, _yield$axios$post, data, status;

                    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
                      while (1) {
                        switch (_context3.prev = _context3.next) {
                          case 0:
                            check = new Date(Date.now()) < new Date(_store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].state.auth.tokenExpirey) && _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].getters.isUserLoggedIn;

                            if (check) {
                              _context3.next = 3;
                              break;
                            }

                            return _context3.abrupt("return", resolve(false));

                          case 3:
                            _context3.prev = 3;
                            _context3.next = 6;
                            return _axios__WEBPACK_IMPORTED_MODULE_3__["default"].post("".concat(window.config.path_prefix, "/api/get_user"), null, {
                              handleErrors: false
                            });

                          case 6:
                            _yield$axios$post = _context3.sent;
                            data = _yield$axios$post.data;
                            _this5.profile = data.idTokenPayload;
                            console.log(data, _this5.profile);
                            _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("UPDATE_USER_INFO", {
                              displayName: _this5.profile.name,
                              email: _this5.profile.email,
                              photoURL: "/assets/images/avatar-s-11.jpg",
                              // From Auth
                              status: "online" // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
                              // uid: this.profile.sub

                            });
                            return _context3.abrupt("return", resolve(true));

                          case 14:
                            _context3.prev = 14;
                            _context3.t0 = _context3["catch"](3);
                            console.log("not logged in", _context3.t0);
                            status = _context3.t0.response.status;

                            if (!(status == 401)) {
                              _context3.next = 21;
                              break;
                            }

                            _store_store_js__WEBPACK_IMPORTED_MODULE_2__["default"].commit("UPDATE_USER_INFO", {});
                            return _context3.abrupt("return", resolve(false));

                          case 21:
                          case "end":
                            return _context3.stop();
                        }
                      }
                    }, _callee3, null, [[3, 14]]);
                  }));

                  return function (_x3) {
                    return _ref2.apply(this, arguments);
                  };
                }()));

              case 1:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }));

      function isAuthenticated() {
        return _isAuthenticated.apply(this, arguments);
      }

      return isAuthenticated;
    }()
  }]);

  return AuthService;
}(events__WEBPACK_IMPORTED_MODULE_1___default.a);

/* harmony default export */ __webpack_exports__["default"] = (new AuthService());

/***/ }),

/***/ "../Panel/Resources/js/src/axios.js":
/*!******************************************!*\
  !*** ../Panel/Resources/js/src/axios.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "../Panel/node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _store_store_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/store/store.js */ "../Panel/Resources/js/src/store/store.js");
/* harmony import */ var _auth_authService__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/auth/authService */ "../Panel/Resources/js/src/auth/authService.js");
// axios



var domain = "";
var headers = {
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
}; // authService.on("loginEvent",e=>{
//     if(!e.loggedIn) headers['Authorization']="";
// })

var instance = axios__WEBPACK_IMPORTED_MODULE_0___default.a.create({
  domain: domain,
  headers: headers,
  withCredentials: true // You can add your headers here

});
instance.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  console.log(error.config); //if set error handler to false, then dont show alert

  if (error.config && error.config.handleErrors == false) {
    return Promise.reject(error);
  }

  var status = error.response.status;

  if (status == 404) {
    window.Iracode["goto"]("/error-404");
    return;
  } // Show the user a 500 error


  if (status >= 500) {
    // Iracode.$emit('error', error.response.data.message)
    window.Iracode["goto"]("/error-500");
    return;
  }

  window.Iracode.error(error.response.data.message ? error.response.data.message : error.message); // Handle Session Timeouts

  if (status === 401) {
    localStorage.removeItem("vuex");
    localStorage.removeItem("_secure__ls__metadata");
    window.location.href = "".concat(window.config.panel_url, "/login");
  } // Handle Forbidden


  if (status === 403) {
    router.push({
      name: '403'
    });
  } // Handle Token Timeouts
  //   if (status === 419) {
  //     Iracode.$emit('token-expired')
  //   }


  return Promise.reject(error);
});
/* harmony default export */ __webpack_exports__["default"] = (instance);

/***/ }),

/***/ "../Panel/Resources/js/src/layouts/components/navbar/navbarSearchAndPinList.js":
/*!*************************************************************************************!*\
  !*** ../Panel/Resources/js/src/layouts/components/navbar/navbarSearchAndPinList.js ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  pages: {
    key: "title",
    data: [// DASHBOARDS
    {
      title: "Analytics Dashboard",
      url: "/dashboard/analytics",
      icon: "HomeIcon",
      is_bookmarked: false
    }, {
      title: "eCommerce Dashboard",
      url: "/dashboard/ecommerce",
      icon: "HomeIcon",
      is_bookmarked: false
    }, // APPS
    {
      title: "Todo",
      url: "/apps/todo",
      icon: "CheckSquareIcon",
      is_bookmarked: true
    }, {
      title: "Chat",
      url: "/apps/chat",
      icon: "MessageSquareIcon",
      is_bookmarked: true
    }, {
      title: "Email",
      url: "/apps/email",
      icon: "MailIcon",
      is_bookmarked: true
    }, {
      title: "Calendar",
      url: "/apps/calendar/vue-simple-calendar",
      icon: "CalendarIcon",
      is_bookmarked: true
    }, {
      title: "E-Commerce Shop",
      url: "/apps/eCommerce/shop",
      icon: "ShoppingCartIcon",
      is_bookmarked: true
    }, {
      title: "E-Commerce Item Detail",
      url: "/apps/eCommerce/item",
      icon: "SmartphoneIcon",
      is_bookmarked: false
    }, {
      title: "E-Commerce Wish List",
      url: "/apps/eCommerce/wish-list",
      icon: "HeartIcon",
      is_bookmarked: false
    }, {
      title: "E-Commerce Checkout",
      url: "/apps/eCommerce/checkout",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, // UI ELEMENTS
    {
      title: "Data List - List View",
      url: "/ui-elements/data-list/list-view",
      icon: "ListIcon",
      is_bookmarked: false
    }, {
      title: "Data List - Thumb View",
      url: "/ui-elements/data-list/thumb-view",
      icon: "ImageIcon",
      is_bookmarked: false
    }, {
      title: "Vuesax Grid",
      url: "/ui-elements/grid/vuesax",
      icon: "LayoutIcon",
      is_bookmarked: false
    }, {
      title: "Tailwind Grid",
      url: "/ui-elements/grid/tailwind",
      icon: "LayoutIcon",
      is_bookmarked: false
    }, {
      title: "Colors",
      url: "/ui-elements/colors",
      icon: "DropletIcon",
      is_bookmarked: false
    }, {
      title: "Basic Cards",
      url: "/ui-elements/card/basic",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Statistics Card",
      url: "/ui-elements/card/statistics",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Analytics Cards",
      url: "/ui-elements/card/analytics",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Card Actions",
      url: "/ui-elements/card/card-actions",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Card Colors",
      url: "/ui-elements/card/card-colors",
      icon: "FeatherIcon",
      is_bookmarked: false
    }, {
      title: "Table",
      url: "/ui-elements/table",
      icon: "GridIcon",
      is_bookmarked: false
    }, {
      title: "agGrid Table",
      url: "/ui-elements/ag-grid-table",
      icon: "GridIcon",
      is_bookmarked: false
    }, {
      title: "Alert Component",
      url: "/components/alert",
      icon: "AlertTriangleIcon",
      is_bookmarked: false
    }, {
      title: "Avatar Component",
      url: "/components/avatar",
      icon: "UserIcon",
      is_bookmarked: false
    }, {
      title: "Breadcrumb Component",
      url: "/components/breadcrumb",
      icon: "NavigationIcon",
      is_bookmarked: false
    }, {
      title: "Button Component",
      url: "/components/button",
      icon: "BoldIcon",
      is_bookmarked: false
    }, {
      title: "Button Group Component",
      url: "/components/button-group",
      icon: "BoldIcon",
      is_bookmarked: false
    }, {
      title: "Chip Component",
      url: "/components/chip",
      icon: "TagIcon",
      is_bookmarked: false
    }, {
      title: "Collapse Component",
      url: "/components/collapse",
      icon: "PlusIcon",
      is_bookmarked: false
    }, {
      title: "Dialogs Component",
      url: "/components/dialogs",
      icon: "CopyIcon",
      is_bookmarked: false
    }, {
      title: "Divider Component",
      url: "/components/divider",
      icon: "MinusIcon",
      is_bookmarked: false
    }, {
      title: "DropDown Component",
      url: "/components/dropdown",
      icon: "MoreHorizontalIcon",
      is_bookmarked: false
    }, {
      title: "List Component",
      url: "/components/list",
      icon: "ListIcon",
      is_bookmarked: false
    }, {
      title: "Loading Component",
      url: "/components/loading",
      icon: "LoaderIcon",
      is_bookmarked: false
    }, {
      title: "Navbar Component",
      url: "/components/navbar",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Notifications Component",
      url: "/components/notifications",
      icon: "BellIcon",
      is_bookmarked: false
    }, {
      title: "Pagination Component",
      url: "/components/pagination",
      icon: "ChevronsRightIcon",
      is_bookmarked: false
    }, {
      title: "Popup Component",
      url: "/components/popup",
      icon: "CopyIcon",
      is_bookmarked: false
    }, {
      title: "Progress Component",
      url: "/components/progress",
      icon: "SlidersIcon",
      is_bookmarked: false
    }, {
      title: "Sidebar Component",
      url: "/components/sidebar",
      icon: "SidebarIcon",
      is_bookmarked: false
    }, {
      title: "Slider Component",
      url: "/components/slider",
      icon: "SlidersIcon",
      is_bookmarked: false
    }, {
      title: "Tabs Component",
      url: "/components/tabs",
      icon: "CreditCardIcon",
      is_bookmarked: false
    }, {
      title: "Tooltip Component",
      url: "/components/tooltip",
      icon: "AlertCircleIcon",
      is_bookmarked: false
    }, {
      title: "Upload Component",
      url: "/components/upload",
      icon: "UploadIcon",
      is_bookmarked: false
    }, // FORMS
    // {title: "Select Form Element",       url: "/forms/form-elements/select",         icon: "CheckIcon",          is_bookmarked: false},
    {
      title: "Switch Form Element",
      url: "/forms/form-elements/switch",
      icon: "ToggleLeftIcon",
      is_bookmarked: false
    }, {
      title: "Checkbox Form Element",
      url: "/forms/form-elements/checkbox",
      icon: "CheckSquareIcon",
      is_bookmarked: false
    }, {
      title: "Radio Form Element",
      url: "/forms/form-elements/radio",
      icon: "DiscIcon",
      is_bookmarked: false
    }, {
      title: "Input Form Element",
      url: "/forms/form-elements/input",
      icon: "TypeIcon",
      is_bookmarked: false
    }, {
      title: "Number Input Form Element",
      url: "/forms/form-elements/number-input",
      icon: "TypeIcon",
      is_bookmarked: false
    }, {
      title: "Textarea Form Element",
      url: "/forms/form-elements/textarea",
      icon: "TypeIcon",
      is_bookmarked: false
    }, {
      title: "Form Layouts",
      url: "/forms/form-layouts",
      icon: "LayoutIcon",
      is_bookmarked: false
    }, {
      title: "Form Wizard",
      url: "/forms/form-wizard",
      icon: "GitCommitIcon",
      is_bookmarked: false
    }, {
      title: "Form Validation",
      url: "/forms/form-validation",
      icon: "CheckSquareIcon",
      is_bookmarked: false
    }, {
      title: "Form Input Group",
      url: "/forms/form-input-group",
      icon: "MenuIcon",
      is_bookmarked: false
    }, // PAGES
    {
      title: "Login Page",
      url: "/pages/login",
      icon: "LockIcon",
      is_bookmarked: false
    }, {
      title: "Register Page",
      url: "/pages/register",
      icon: "UserPlusIcon",
      is_bookmarked: false
    }, {
      title: "Forgot Password Page",
      url: "/pages/forgot-password",
      icon: "HelpCircleIcon",
      is_bookmarked: false
    }, {
      title: "Reset Password Page",
      url: "/pages/reset-password",
      icon: "UnlockIcon",
      is_bookmarked: false
    }, {
      title: "Lock Screen Page",
      url: "/pages/lock-screen",
      icon: "LockIcon",
      is_bookmarked: false
    }, {
      title: "Coming Soon Page",
      url: "/pages/comingsoon",
      icon: "ClockIcon",
      is_bookmarked: false
    }, {
      title: "404 Page",
      url: "/pages/error-404",
      icon: "MonitorIcon",
      is_bookmarked: false
    }, {
      title: "500 Page",
      url: "/pages/error-500",
      icon: "MonitorIcon",
      is_bookmarked: false
    }, {
      title: "Not Authorized Page",
      url: "/pages/not-authorized",
      icon: "XCircleIcon",
      is_bookmarked: false
    }, {
      title: "Maintenance Page",
      url: "/pages/maintenance",
      icon: "MonitorIcon",
      is_bookmarked: false
    }, {
      title: "Profile Page",
      url: "/pages/profile",
      icon: "UserIcon",
      is_bookmarked: false
    }, {
      title: "User List",
      url: "/pages/user/user-list",
      icon: "ListIcon",
      is_bookmarked: false
    }, {
      title: "User View",
      url: "/pages/user/user-view/268",
      icon: "UserIcon",
      is_bookmarked: false
    }, {
      title: "User Edit",
      url: "/pages/user/user-edit/268",
      icon: "EditIcon",
      is_bookmarked: false
    }, {
      title: "User Settings",
      url: "/pages/user-settings",
      icon: "SettingsIcon",
      is_bookmarked: false
    }, {
      title: "FAQ Page",
      url: "/pages/faq",
      icon: "HelpCircleIcon",
      is_bookmarked: false
    }, {
      title: "KnowledgeBase Page",
      url: "/pages/knowledge-base",
      icon: "BookIcon",
      is_bookmarked: false
    }, {
      title: "Search Page",
      url: "/pages/search",
      icon: "SearchIcon",
      is_bookmarked: false
    }, {
      title: "Invoice Page",
      url: "/pages/invoice",
      icon: "FileIcon",
      is_bookmarked: false
    }, // CHARTS & MAPS
    {
      title: "Apex Charts",
      url: "/charts-and-maps/charts/apex-charts",
      icon: "PieChartIcon",
      is_bookmarked: false
    }, {
      title: "chartjs",
      url: "/charts-and-maps/charts/chartjs",
      icon: "PieChartIcon",
      is_bookmarked: false
    }, {
      title: "echarts",
      url: "/charts-and-maps/charts/echarts",
      icon: "PieChartIcon",
      is_bookmarked: false
    }, {
      title: "Google Map",
      url: "/charts-and-maps/maps/google-map",
      icon: "MapIcon",
      is_bookmarked: false
    }, // EXTENSIONS
    {
      title: "Select Extension",
      url: "/extensions/select",
      icon: "CheckIcon",
      is_bookmarked: false
    }, {
      title: "Quill Editor",
      url: "/extensions/quill-editor",
      icon: "EditIcon",
      is_bookmarked: false
    }, {
      title: "Drag & Drop",
      url: "/extensions/drag-and-drop",
      icon: "CopyIcon",
      is_bookmarked: false
    }, {
      title: "Datepicker",
      url: "/extensions/datepicker",
      icon: "CalendarIcon",
      is_bookmarked: false
    }, {
      title: "Datetime Picker",
      url: "/extensions/datetime-picker",
      icon: "ClockIcon",
      is_bookmarked: false
    }, {
      title: "Access Control",
      url: "/extensions/access-control",
      icon: "LockIcon",
      is_bookmarked: false
    }, {
      title: "I18n",
      url: "/extensions/i18n",
      icon: "GlobeIcon",
      is_bookmarked: false
    }, {
      title: "Carousel",
      url: "/extensions/carousel",
      icon: "LayersIcon",
      is_bookmarked: false
    }, {
      title: "Clipboard",
      url: "/extensions/clipboard",
      icon: "CopyIcon",
      is_bookmarked: false
    }, {
      title: "Context Menu",
      url: "/extensions/context-menu",
      icon: "MoreHorizontalIcon",
      is_bookmarked: false
    }, {
      title: "Star Rating",
      url: "/extensions/star-ratings",
      icon: "StarIcon",
      is_bookmarked: false
    }, {
      title: "Autocomplete",
      url: "/extensions/autocomplete",
      icon: "Edit3Icon",
      is_bookmarked: false
    }, {
      title: "Tree",
      url: "/extensions/tree",
      icon: "GitPullRequestIcon",
      is_bookmarked: false
    }, {
      title: "Import",
      url: "/import-export/import",
      icon: "FileTextIcon",
      is_bookmarked: false
    }, {
      title: "Export",
      url: "/import-export/export",
      icon: "ExternalLinkIcon",
      is_bookmarked: false
    }, {
      title: "Export Selected",
      url: "/import-export/export-selected",
      icon: "ExternalLinkIcon",
      is_bookmarked: false
    }]
  },
  files: {
    key: "file_name",
    data: [{
      file_name: "Joe's CV",
      from: "Stacy Watson",
      file_ext: "doc",
      size: "1.7 mb"
    }, {
      file_name: "Passport Image",
      from: "Ben Sinitiere",
      file_ext: "jpg",
      size: " 52 kb"
    }, {
      file_name: "Questions",
      from: "Charleen Patti",
      file_ext: "doc",
      size: "1.5 gb"
    }, {
      file_name: "Parenting Guide",
      from: "Doyle Blatteau",
      file_ext: "doc",
      size: "2.3 mb"
    }, {
      file_name: "Class Notes",
      from: "Gwen Greenlow",
      file_ext: "doc",
      size: " 30 kb"
    }, {
      file_name: "Class Attendance",
      from: "Tom Alred",
      file_ext: "xls",
      size: "52 mb"
    }, {
      file_name: "Company Salary",
      from: "Nellie Dezan",
      file_ext: "xls",
      size: "29 mb"
    }, {
      file_name: "Company Logo",
      from: "Steve Sheldon",
      file_ext: "jpg",
      size: "1.3 mb"
    }, {
      file_name: "Crime Rates",
      from: "Sherlock Holmes",
      file_ext: "xls",
      size: "37 kb"
    }, {
      file_name: "Ulysses",
      from: "Theresia Wrenne",
      file_ext: "pdf",
      size: "7.2 mb"
    }, {
      file_name: "War and Peace",
      from: "Goldie Highnote",
      file_ext: "pdf",
      size: "10.5 mb"
    }, {
      file_name: "Vedas",
      from: "Ajay Patel",
      file_ext: "pdf",
      size: "8.3 mb"
    }, {
      file_name: "The Trial",
      from: "Sirena Linkert",
      file_ext: "pdf",
      size: "1.5 mb"
    }]
  },
  contacts: {
    key: "name",
    data: [{
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-4.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-4.jpg"),
      name: "Rena Brant",
      email: "nephrod@preany.co.uk",
      time: "21/05/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-2.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-2.jpg"),
      name: "Mariano Packard",
      email: "seek@sparaxis.org",
      time: "14/01/2018"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-24.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-24.jpg"),
      name: "Risa Montufar",
      email: "vagary@unblist.org",
      time: "10/08/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-15.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-15.jpg"),
      name: "Maragaret Cimo",
      email: "designed@insanely.net",
      time: "01/12/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-7.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-7.jpg"),
      name: "Jona Prattis",
      email: "unwieldable@unblist.org",
      time: "21/05/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-5.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-5.jpg"),
      name: "Edmond Chicon",
      email: "museist@anaphyte.co.uk",
      time: "15/11/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-25.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-25.jpg"),
      name: "Abbey Darden",
      email: "astema@defectively.co.uk",
      time: "07/05/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-10.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-10.jpg"),
      name: "Seema Moallankamp",
      email: "fernando@storkish.co.uk",
      time: "13/08/2017"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-2.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-2.jpg"),
      name: "Charleen Warmington",
      email: "furphy@cannibal.net",
      time: "11/08/1891"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-25.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-25.jpg"),
      name: "Geri Linch",
      email: "insignia@markab.org",
      time: "18/01/2015"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-23.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-23.jpg"),
      name: "Shellie Muster",
      email: "maxillary@equalize.co.uk",
      time: "26/07/2019"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-20.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-20.jpg"),
      name: "Jesenia Vanbramer",
      email: "hypotony@phonetist.net",
      time: "12/09/2017"
    }, {
      img: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-23.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-23.jpg"),
      name: "Mardell Channey",
      email: "peseta@myrica.com",
      time: "11/11/2019"
    }]
  }
});

/***/ }),

/***/ "../Panel/Resources/js/src/store/actions.js":
/*!**************************************************!*\
  !*** ../Panel/Resources/js/src/store/actions.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: actions.js
  Description: Vuex Store - actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var actions = {
  // /////////////////////////////////////////////
  // COMPONENTS
  // /////////////////////////////////////////////
  // Vertical NavMenu
  updateVerticalNavMenuWidth: function updateVerticalNavMenuWidth(_ref, width) {
    var commit = _ref.commit;
    commit('UPDATE_VERTICAL_NAV_MENU_WIDTH', width);
  },
  // VxAutoSuggest
  updateStarredPage: function updateStarredPage(_ref2, payload) {
    var commit = _ref2.commit;
    commit('UPDATE_STARRED_PAGE', payload);
  },
  // The Navbar
  arrangeStarredPagesLimited: function arrangeStarredPagesLimited(_ref3, list) {
    var commit = _ref3.commit;
    commit('ARRANGE_STARRED_PAGES_LIMITED', list);
  },
  arrangeStarredPagesMore: function arrangeStarredPagesMore(_ref4, list) {
    var commit = _ref4.commit;
    commit('ARRANGE_STARRED_PAGES_MORE', list);
  },
  // /////////////////////////////////////////////
  // UI
  // /////////////////////////////////////////////
  toggleContentOverlay: function toggleContentOverlay(_ref5) {
    var commit = _ref5.commit;
    commit('TOGGLE_CONTENT_OVERLAY');
  },
  updateTheme: function updateTheme(_ref6, val) {
    var commit = _ref6.commit;
    commit('UPDATE_THEME', val);
  },
  // /////////////////////////////////////////////
  // User/Account
  // /////////////////////////////////////////////
  updateUserInfo: function updateUserInfo(_ref7, payload) {
    var commit = _ref7.commit;
    commit('UPDATE_USER_INFO', payload);
  },
  updateUserRole: function updateUserRole(_ref8, payload) {
    var dispatch = _ref8.dispatch;
    // Change client side
    payload.aclChangeRole(payload.userRole); // Make API call to server for changing role
    // Change userInfo in localStorage and store

    dispatch('updateUserInfo', {
      userRole: payload.userRole
    });
  },
  setCurrentResource: function setCurrentResource(_ref9, payload) {
    var commit = _ref9.commit;
    commit('SET_CURRENT_RESOURCE', payload);
  },
  setFilter: function setFilter(_ref10, payload) {
    var commit = _ref10.commit;
    commit('SET_CRUD_FILTER_MODEL', payload);
  },
  updateCrudFilter: function updateCrudFilter(_ref11, payload) {
    var commit = _ref11.commit;
    commit('UPDATE_CRUD_FILTER', payload);
  }
};
/* harmony default export */ __webpack_exports__["default"] = (actions);

/***/ }),

/***/ "../Panel/Resources/js/src/store/auth/moduleAuth.js":
/*!**********************************************************!*\
  !*** ../Panel/Resources/js/src/store/auth/moduleAuth.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _moduleAuthState_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./moduleAuthState.js */ "../Panel/Resources/js/src/store/auth/moduleAuthState.js");
/* harmony import */ var _moduleAuthMutations_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./moduleAuthMutations.js */ "../Panel/Resources/js/src/store/auth/moduleAuthMutations.js");
/* harmony import */ var _moduleAuthActions_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./moduleAuthActions.js */ "../Panel/Resources/js/src/store/auth/moduleAuthActions.js");
/* harmony import */ var _moduleAuthGetters_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./moduleAuthGetters.js */ "../Panel/Resources/js/src/store/auth/moduleAuthGetters.js");
/*=========================================================================================
  File Name: moduleAuth.js
  Description: Auth Module
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/




/* harmony default export */ __webpack_exports__["default"] = ({
  namespaced: true,
  state: _moduleAuthState_js__WEBPACK_IMPORTED_MODULE_0__["default"],
  mutations: _moduleAuthMutations_js__WEBPACK_IMPORTED_MODULE_1__["default"],
  actions: _moduleAuthActions_js__WEBPACK_IMPORTED_MODULE_2__["default"],
  getters: _moduleAuthGetters_js__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "../Panel/Resources/js/src/store/auth/moduleAuthActions.js":
/*!*****************************************************************!*\
  !*** ../Panel/Resources/js/src/store/auth/moduleAuthActions.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: moduleAuthActions.js
  Description: Auth Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
/* harmony default export */ __webpack_exports__["default"] = ({});

/***/ }),

/***/ "../Panel/Resources/js/src/store/auth/moduleAuthGetters.js":
/*!*****************************************************************!*\
  !*** ../Panel/Resources/js/src/store/auth/moduleAuthGetters.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: moduleAuthGetters.js
  Description: Auth Module Getters
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
/* harmony default export */ __webpack_exports__["default"] = ({});

/***/ }),

/***/ "../Panel/Resources/js/src/store/auth/moduleAuthMutations.js":
/*!*******************************************************************!*\
  !*** ../Panel/Resources/js/src/store/auth/moduleAuthMutations.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/axios */ "../Panel/Resources/js/src/axios.js");
/*=========================================================================================
  File Name: moduleAuthMutations.js
  Description: Auth Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

/* harmony default export */ __webpack_exports__["default"] = ({
  SET_BEARER: function SET_BEARER(state, accessToken) {
    _axios__WEBPACK_IMPORTED_MODULE_0__["default"].defaults.headers.common['Authorization'] = 'Bearer ' + accessToken;
    state.accessToken = accessToken;
  },
  SET_TOKEN_EXPIREY: function SET_TOKEN_EXPIREY(state, expirey) {
    state.tokenExpirey = expirey;
  },
  SET_LOGIN_RESULT: function SET_LOGIN_RESULT(state, loginResult) {
    state.loginResult = loginResult;
  }
});

/***/ }),

/***/ "../Panel/Resources/js/src/store/auth/moduleAuthState.js":
/*!***************************************************************!*\
  !*** ../Panel/Resources/js/src/store/auth/moduleAuthState.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _auth_authService__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/auth/authService */ "../Panel/Resources/js/src/auth/authService.js");
/*=========================================================================================
  File Name: moduleAuthState.js
  Description: Auth Module State
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

/* harmony default export */ __webpack_exports__["default"] = ({
  tokenExpirey: "",
  accessToken: "",
  userInfo: {},
  loginResult: {}
});

/***/ }),

/***/ "../Panel/Resources/js/src/store/getters.js":
/*!**************************************************!*\
  !*** ../Panel/Resources/js/src/store/getters.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: getters.js
  Description: Vuex Store - getters
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
// added so later we can keep breakpoint in sync automatically using this config file
// import tailwindConfig from "../../tailwind.config.js"
var getters = {
  // COMPONENT
  // vx-autosuggest
  // starredPages: state => state.navbarSearchAndPinList.data.filter((page) => page.highlightAction),
  windowBreakPoint: function windowBreakPoint(state) {
    // This should be same as tailwind. So, it stays in sync with tailwind utility classes
    if (state.windowWidth >= 1200) return "xl";else if (state.windowWidth >= 992) return "lg";else if (state.windowWidth >= 768) return "md";else if (state.windowWidth >= 576) return "sm";else return "xs";
  },
  isUserLoggedIn: function isUserLoggedIn(state) {
    return state.auth.userInfo.email;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (getters);

/***/ }),

/***/ "../Panel/Resources/js/src/store/mutations.js":
/*!****************************************************!*\
  !*** ../Panel/Resources/js/src/store/mutations.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: mutations.js
  Description: Vuex Store - mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var mutations = {
  // /////////////////////////////////////////////
  // COMPONENTS
  // /////////////////////////////////////////////
  // Vertical NavMenu
  TOGGLE_IS_VERTICAL_NAV_MENU_ACTIVE: function TOGGLE_IS_VERTICAL_NAV_MENU_ACTIVE(state, value) {
    state.isVerticalNavMenuActive = value;
  },
  TOGGLE_REDUCE_BUTTON: function TOGGLE_REDUCE_BUTTON(state, val) {
    state.reduceButton = val;
  },
  UPDATE_MAIN_LAYOUT_TYPE: function UPDATE_MAIN_LAYOUT_TYPE(state, val) {
    state.mainLayoutType = val;
  },
  UPDATE_VERTICAL_NAV_MENU_ITEMS_MIN: function UPDATE_VERTICAL_NAV_MENU_ITEMS_MIN(state, val) {
    state.verticalNavMenuItemsMin = val;
  },
  UPDATE_VERTICAL_NAV_MENU_WIDTH: function UPDATE_VERTICAL_NAV_MENU_WIDTH(state, width) {
    state.verticalNavMenuWidth = width;
  },
  UPDATE_LOCKED_STATE: function UPDATE_LOCKED_STATE(state, payload) {
    state.locked = payload;
  },
  // VxAutoSuggest
  UPDATE_STARRED_PAGE: function UPDATE_STARRED_PAGE(state, payload) {
    // find item index in search list state
    var index = state.navbarSearchAndPinList["pages"].data.findIndex(function (item) {
      return item.url == payload.url;
    }); // update the main list

    state.navbarSearchAndPinList["pages"].data[index].is_bookmarked = payload.val; // if val is true add it to starred else remove

    if (payload.val) {
      state.starredPages.push(state.navbarSearchAndPinList["pages"].data[index]);
    } else {
      // find item index from starred pages
      var _index = state.starredPages.findIndex(function (item) {
        return item.url == payload.url;
      }); // remove item using index


      state.starredPages.splice(_index, 1);
    }
  },
  // Navbar-Vertical
  ARRANGE_STARRED_PAGES_LIMITED: function ARRANGE_STARRED_PAGES_LIMITED(state, list) {
    var starredPagesMore = state.starredPages.slice(10);
    state.starredPages = list.concat(starredPagesMore);
  },
  ARRANGE_STARRED_PAGES_MORE: function ARRANGE_STARRED_PAGES_MORE(state, list) {
    var downToUp = false;
    var lastItemInStarredLimited = state.starredPages[10];
    var starredPagesLimited = state.starredPages.slice(0, 10);
    state.starredPages = starredPagesLimited.concat(list);
    state.starredPages.slice(0, 10).map(function (i) {
      if (list.indexOf(i) > -1) downToUp = true;
    });

    if (!downToUp) {
      state.starredPages.splice(10, 0, lastItemInStarredLimited);
    }
  },
  // ////////////////////////////////////////////
  // UI
  // ////////////////////////////////////////////
  TOGGLE_CONTENT_OVERLAY: function TOGGLE_CONTENT_OVERLAY(state, val) {
    state.bodyOverlay = val;
  },
  UPDATE_PRIMARY_COLOR: function UPDATE_PRIMARY_COLOR(state, val) {
    state.themePrimaryColor = val;
  },
  UPDATE_THEME: function UPDATE_THEME(state, val) {
    state.theme = val;
  },
  UPDATE_WINDOW_WIDTH: function UPDATE_WINDOW_WIDTH(state, width) {
    state.windowWidth = width;
  },
  UPDATE_WINDOW_SCROLL_Y: function UPDATE_WINDOW_SCROLL_Y(state, val) {
    state.scrollY = val;
  },
  // /////////////////////////////////////////////
  // User/Account
  // /////////////////////////////////////////////
  // Updates user info in state and localstorage
  UPDATE_USER_INFO: function UPDATE_USER_INFO(state, payload) {
    state.auth.userInfo = payload;
  },
  SET_AUTHENTICATED: function SET_AUTHENTICATED(state, payload) {
    state.isAuthenticated = payload;
  },
  SET_CURRENT_RESOURCE: function SET_CURRENT_RESOURCE(state, payload) {
    state.currentResource = payload;
  },
  SET_CRUD_FILTER_MODEL: function SET_CRUD_FILTER_MODEL(state, payload) {
    state.crud.filters[payload.model] = payload.filters;
  },
  UPDATE_CRUD_FILTER: function UPDATE_CRUD_FILTER(state, payload) {
    state.crud.filters[payload.model][payload.column] = payload.data;
  }
};
/* harmony default export */ __webpack_exports__["default"] = (mutations);

/***/ }),

/***/ "../Panel/Resources/js/src/store/state.js":
/*!************************************************!*\
  !*** ../Panel/Resources/js/src/store/state.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layouts_components_navbar_navbarSearchAndPinList__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/layouts/components/navbar/navbarSearchAndPinList */ "../Panel/Resources/js/src/layouts/components/navbar/navbarSearchAndPinList.js");
/*=========================================================================================
  File Name: state.js
  Description: Vuex Store - state
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
 // /////////////////////////////////////////////
// Helper
// /////////////////////////////////////////////
// *From Auth - Data will be received from auth provider

var userDefaults = {
  uid: 0,
  // From Auth
  displayName: "John Doe",
  // From Auth
  about: "Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.",
  photoURL: __webpack_require__(/*! @assets/images/portrait/small/avatar-s-11.jpg */ "../Panel/Resources/assets/images/portrait/small/avatar-s-11.jpg"),
  // From Auth
  status: "online",
  userRole: "admin"
};
var userInfoLocalStorage = JSON.parse(localStorage.getItem("userInfo")) || {}; // Set default values for active-user
// More data can be added by auth provider or other plugins/packages

var getUserInfo = function getUserInfo() {
  var userInfo = {}; // Update property in user

  Object.keys(userDefaults).forEach(function (key) {
    // If property is defined in localStorage => Use that
    userInfo[key] = userInfoLocalStorage[key] ? userInfoLocalStorage[key] : userDefaults[key];
  }); // Include properties from localStorage

  Object.keys(userInfoLocalStorage).forEach(function (key) {
    if (userInfo[key] == undefined && userInfoLocalStorage[key] != null) userInfo[key] = userInfoLocalStorage[key];
  });
  return userInfo;
}; // /////////////////////////////////////////////
// State
// /////////////////////////////////////////////


var state = {
  AppActiveUser: getUserInfo(),
  bodyOverlay: false,
  isVerticalNavMenuActive: true,
  mainLayoutType: vuexy.themeConfig.mainLayoutType || "vertical",
  navbarSearchAndPinList: _layouts_components_navbar_navbarSearchAndPinList__WEBPACK_IMPORTED_MODULE_0__["default"],
  reduceButton: vuexy.themeConfig.sidebarCollapsed,
  verticalNavMenuWidth: "default",
  verticalNavMenuItemsMin: false,
  scrollY: 0,
  isAuthenticated: false,
  starredPages: _layouts_components_navbar_navbarSearchAndPinList__WEBPACK_IMPORTED_MODULE_0__["default"]["pages"].data.filter(function (page) {
    return page.is_bookmarked;
  }),
  theme: vuexy.themeConfig.theme || "light",
  themePrimaryColor: vuexy.colors.primary,
  currentResource: {},
  locked: false,
  // Can be used to get current window with
  // Note: Above breakpoint state is for internal use of sidebar & navbar component
  windowWidth: null,
  crud: {
    filters: {}
  }
};
/* harmony default export */ __webpack_exports__["default"] = (state);

/***/ }),

/***/ "../Panel/Resources/js/src/store/store.js":
/*!************************************************!*\
  !*** ../Panel/Resources/js/src/store/store.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "../Panel/node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "../Panel/node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _state__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./state */ "../Panel/Resources/js/src/store/state.js");
/* harmony import */ var _getters__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./getters */ "../Panel/Resources/js/src/store/getters.js");
/* harmony import */ var _mutations__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./mutations */ "../Panel/Resources/js/src/store/mutations.js");
/* harmony import */ var _actions__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./actions */ "../Panel/Resources/js/src/store/actions.js");
/* harmony import */ var _auth_moduleAuth_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./auth/moduleAuth.js */ "../Panel/Resources/js/src/store/auth/moduleAuth.js");
/* harmony import */ var vuex_persistedstate__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vuex-persistedstate */ "../Panel/node_modules/vuex-persistedstate/dist/vuex-persistedstate.es.js");
/* harmony import */ var secure_ls__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! secure-ls */ "../Panel/node_modules/secure-ls/dist/secure-ls.js");
/* harmony import */ var secure_ls__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(secure_ls__WEBPACK_IMPORTED_MODULE_8__);
/*=========================================================================================
  File Name: store.js
  Description: Vuex store
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/






vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(vuex__WEBPACK_IMPORTED_MODULE_1__["default"]); // import moduleTodo from './todo/moduleTodo.js'
// import moduleCalendar from './calendar/moduleCalendar.js'
// import moduleChat from './chat/moduleChat.js'
// import moduleEmail from './email/moduleEmail.js'




var ls = new secure_ls__WEBPACK_IMPORTED_MODULE_8___default.a({
  isCompression: false
});
/* harmony default export */ __webpack_exports__["default"] = (new vuex__WEBPACK_IMPORTED_MODULE_1__["default"].Store({
  plugins: [Object(vuex_persistedstate__WEBPACK_IMPORTED_MODULE_7__["default"])({
    storage: {
      getItem: function getItem(key) {
        return ls.get(key);
      },
      setItem: function setItem(key, value) {
        return ls.set(key, value);
      },
      removeItem: function removeItem(key) {
        return ls.remove(key);
      }
    }
  })],
  getters: _getters__WEBPACK_IMPORTED_MODULE_3__["default"],
  mutations: _mutations__WEBPACK_IMPORTED_MODULE_4__["default"],
  state: _state__WEBPACK_IMPORTED_MODULE_2__["default"],
  actions: _actions__WEBPACK_IMPORTED_MODULE_5__["default"],
  modules: {
    // todo: moduleTodo,
    // calendar: moduleCalendar,
    // chat: moduleChat,
    // email: moduleEmail,
    auth: _auth_moduleAuth_js__WEBPACK_IMPORTED_MODULE_6__["default"]
  },
  strict: "development" !== 'production'
}));

/***/ }),

/***/ "./Js/Tickets.vue":
/*!************************!*\
  !*** ./Js/Tickets.vue ***!
  \************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Tickets.vue?vue&type=template&id=2f367baf& */ "./Js/Tickets.vue?vue&type=template&id=2f367baf&");
/* harmony import */ var _Tickets_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Tickets.vue?vue&type=script&lang=js& */ "./Js/Tickets.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Tickets_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "Js/Tickets.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./Js/Tickets.vue?vue&type=script&lang=js&":
/*!*************************************************!*\
  !*** ./Js/Tickets.vue?vue&type=script&lang=js& ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tickets_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../node_modules/babel-loader/lib??ref--4-0!../node_modules/vue-loader/lib??vue-loader-options!./Tickets.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Js/Tickets.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Tickets_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./Js/Tickets.vue?vue&type=template&id=2f367baf&":
/*!*******************************************************!*\
  !*** ./Js/Tickets.vue?vue&type=template&id=2f367baf& ***!
  \*******************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../node_modules/vue-loader/lib??vue-loader-options!./Tickets.vue?vue&type=template&id=2f367baf& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./Js/Tickets.vue?vue&type=template&id=2f367baf&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Tickets_vue_vue_type_template_id_2f367baf___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Js/Tickets.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./Js/Tickets.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _external_modules_Panel_Resources_js_src_axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @external_modules/Panel/Resources/js/src/axios */ "../Panel/Resources/js/src/axios.js");
/* harmony import */ var bvtnet_items_provider__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! bvtnet-items-provider */ "./node_modules/bvtnet-items-provider/dist/index.js");
/* harmony import */ var bvtnet_items_provider__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(bvtnet_items_provider__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    var fields = [{
      data: 'id',
      name: 'ticketit.id'
    }, {
      data: 'subject',
      name: 'subject'
    }, {
      data: 'status',
      name: 'ticketit_statuses.name'
    }, {
      data: 'updated_at',
      name: 'ticketit.updated_at'
    }, {
      data: 'agent',
      name: 'users.name'
    }];
    var ip = new bvtnet_items_provider__WEBPACK_IMPORTED_MODULE_1___default.a({
      axios: _external_modules_Panel_Resources_js_src_axios__WEBPACK_IMPORTED_MODULE_0__["default"],
      fields: fields
    });
    return {
      ip: ip
    };
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./Js/Tickets.vue?vue&type=template&id=2f367baf&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./Js/Tickets.vue?vue&type=template&id=2f367baf& ***!
  \*************************************************************************************************************************************************************************************/
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
    [
      _c("p", [_vm._v("Users")]),
      _vm._v(" "),
      _c("b-table", {
        attrs: {
          items: _vm.ip.items,
          fields: _vm.ip.fields,
          busy: _vm.ip.busy,
          "current-page": _vm.ip.state.currentPage,
          "per-page": _vm.ip.state.perPage,
          filter: _vm.ip.state.filter,
          "filter-ignored-fields": _vm.ip.state.filterIgnoredFields,
          "filter-included-fields": _vm.ip.state.filterIncludedFields
        }
      }),
      _vm._v(" "),
      _vm.ip.totalRows > 0
        ? _c(
            "div",
            { staticClass: "row" },
            [
              _c("b-pagination", {
                attrs: {
                  "per-page": _vm.ip.state.perPage,
                  "total-rows": _vm.ip.totalRows
                },
                model: {
                  value: _vm.ip.state.currentPage,
                  callback: function($$v) {
                    _vm.$set(_vm.ip.state, "currentPage", $$v)
                  },
                  expression: "ip.state.currentPage"
                }
              })
            ],
            1
          )
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);