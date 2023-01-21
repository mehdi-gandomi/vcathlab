(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[12],{

/***/ "../AccessLevel/Resources/js/components/DynamicTableActions.js":
/*!*********************************************************************!*\
  !*** ../AccessLevel/Resources/js/components/DynamicTableActions.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var Vue = window.Vue;
/* harmony default export */ __webpack_exports__["default"] = (Vue.extend({
  template: "\n    <td class=\"pr-6 align-middle block w-full\">\n\t<span v-if=\"params.exposeRowId\" class=\"row-id\" :data-id=\"params.data.id\"/>\n        <div class=\"inline-flex items-center justify-center w-full\" >\n            <vx-tooltip v-for=\"(button, i) in params.buttons\" v-if=\"!handleCallbackOrValue(button.disable)\" :key=\"i\" :text=\"handleCallbackOrValue(button.text)\">\n\t\t<vs-button :href=\"isHref(button.link) && button.link\" :to=\"button.link && button.link.call(getInstance())\" @click=\"button.callback && button.callback.call(getInstance())\" :color=\"handleCallbackOrValue(button.color)\" type=\"relief\" style=\"margin:0 0.2rem\" size=\"small\" v-bind=\"button.$attrs && button.$attrs\"><i v-if=\"button.class || button.icon\" :class=\"button.class ? handleCallbackOrValue(button.class) : 'far fa-lg fa-'+handleCallbackOrValue(button.icon)\"/></vs-button>\n\t</vx-tooltip>\n        </div>\n    </td>\n    ",
  data: function data() {
    return {
      value: null
    };
  },
  methods: {
    getInstance: function getInstance() {
      return this;
    },
    handleCallbackOrValue: function handleCallbackOrValue(val) {
      return typeof val == "function" ? val.call(this) : val;
    },
    isHref: function isHref(link) {
      if (typeof link == "function") link = link.call(this);
      if (!link) return false;
      link = (link + "").trim().toLowerCase();
      return link.substr(0, 2) == "//" || link.substr(0, 4) == "www." || ~link.indexOf("http:") || ~link.indexOf("https:");
    }
  }
}));

/***/ }),

/***/ "../AccessLevel/Resources/js/mixins/HasDynamicTableActions.js":
/*!********************************************************************!*\
  !*** ../AccessLevel/Resources/js/mixins/HasDynamicTableActions.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_DynamicTableActions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/DynamicTableActions */ "../AccessLevel/Resources/js/components/DynamicTableActions.js");


var addCSS = function addCSS(s) {
  return function (d) {
    d.head.appendChild(d.createElement("style")).innerHTML = s;
  }(window.document);
};

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      frameworkComponents: {
        tableActionsRenderer: _components_DynamicTableActions__WEBPACK_IMPORTED_MODULE_0__["default"]
      }
    };
  },
  mounted: function mounted() {
    addCSS("\n\t    \t[dir] .vs-button.small:not(.includeIconOnly) { padding: 7px}\n\t    ");
  }
});

/***/ }),

/***/ "../AccessLevel/Resources/js/roles/AddUsers.vue":
/*!******************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/AddUsers.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AddUsers.vue?vue&type=template&id=de696470& */ "../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470&");
/* harmony import */ var _AddUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AddUsers.vue?vue&type=script&lang=js& */ "../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _AddUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__["render"],
  _AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "AccessLevel/Resources/js/roles/AddUsers.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_AddUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./AddUsers.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_AddUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470&":
/*!*************************************************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./AddUsers.vue?vue&type=template&id=de696470& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_AddUsers_vue_vue_type_template_id_de696470___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "../AccessLevel/Resources/js/roles/OutUsers.vue":
/*!******************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/OutUsers.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./OutUsers.vue?vue&type=template&id=244949bb& */ "../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb&");
/* harmony import */ var _OutUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OutUsers.vue?vue&type=script&lang=js& */ "../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../Panel/node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_Panel_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _OutUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__["render"],
  _OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "AccessLevel/Resources/js/roles/OutUsers.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_OutUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/babel-loader/lib??ref--4-0!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./OutUsers.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_Panel_node_modules_babel_loader_lib_index_js_ref_4_0_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_OutUsers_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb&":
/*!*************************************************************************************!*\
  !*** ../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../Panel/node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../Panel/node_modules/vue-loader/lib??vue-loader-options!./OutUsers.vue?vue&type=template&id=244949bb& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _Panel_node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_Panel_node_modules_vue_loader_lib_index_js_vue_loader_options_OutUsers_vue_vue_type_template_id_244949bb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
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
  name: 'AddUsers',
  props: []
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @node_modules/jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_node_modules_jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _mixins_HasFilter__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/mixins/HasFilter */ "./Resources/js/src/mixins/HasFilter.js");
/* harmony import */ var _mixins_IndexPage__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/mixins/IndexPage */ "./Resources/js/src/mixins/IndexPage.js");
/* harmony import */ var _mixins_Paginable__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @/mixins/Paginable */ "./Resources/js/src/mixins/Paginable.js");
/* harmony import */ var _mixins_InteractsWithQueryString__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @/mixins/InteractsWithQueryString */ "./Resources/js/src/mixins/InteractsWithQueryString.js");
/* harmony import */ var _components_aggrid_table_Formatters__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @/components/aggrid-table/Formatters */ "./Resources/js/src/components/aggrid-table/Formatters.js");
/* harmony import */ var _mixins_HasDynamicTableActions__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../mixins/HasDynamicTableActions */ "../AccessLevel/Resources/js/mixins/HasDynamicTableActions.js");
/* harmony import */ var _AddUsers_vue__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./AddUsers.vue */ "../AccessLevel/Resources/js/roles/AddUsers.vue");


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

window.XjQuery = _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default.a;







var Vue = window.Vue;
/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixins_HasFilter__WEBPACK_IMPORTED_MODULE_2__["default"], _mixins_IndexPage__WEBPACK_IMPORTED_MODULE_3__["default"], _mixins_Paginable__WEBPACK_IMPORTED_MODULE_4__["default"], _mixins_InteractsWithQueryString__WEBPACK_IMPORTED_MODULE_5__["default"], _mixins_HasDynamicTableActions__WEBPACK_IMPORTED_MODULE_7__["default"]],
  data: function data() {
    return {
      searchQuery: '',
      baseUrl: "/accesslevel/api/role_outusers/?role_id=".concat(this.$route.params.id),
      model: 'User',
      module: 'AccessLevel',
      showCreateButton: false,
      columnDefs: [{
        headerName: this.__('Email'),
        field: 'email',
        resizable: true,
        minWidth: 250,
        checkboxSelection: true,
        filter: 'agTextColumnFilter'
      }, {
        headerName: this.__('Username'),
        field: 'username',
        resizable: true,
        filter: 'agTextColumnFilter'
      }, {
        headerName: this.__('Name'),
        field: 'name',
        resizable: true,
        filter: 'agTextColumnFilter'
      }, {
        headerName: this.__('State'),
        field: 'state',
        resizable: true,
        valueFormatter: _components_aggrid_table_Formatters__WEBPACK_IMPORTED_MODULE_6__["default"].checkboxFormatter,
        cellRenderer: 'checkboxCellRenderer',
        filter: 'agSelectColumnFilter',
        filterParams: {
          buttons: ['apply'],
          closeOnApply: true,
          type: 'select',
          module: 'AccessLevel',
          model: 'User'
        }
      }, {
        headerName: this.__('Actions'),
        field: 'action',
        filter: false,
        minWidth: 150,
        cellRenderer: 'tableActionsRenderer',
        cellRendererParams: {
          model: 'User',
          baseRoutePath: 'accesslevel/role_outusers',
          modelPlural: 'role_outusers',
          baseApiPath: '/accesslevel/api',
          exposeRowId: true,
          buttons: [{
            text: function text() {
              return this.__("Show ".concat(this.params.model));
            },
            link: function link() {
              if (!this.params.data) return "";
              return "/".concat(this.params.baseRoutePath, "/").concat(this.params.data.id);
            },
            color: "primary",
            icon: "eye"
          }, {
            text: function text() {
              return this.__("Edit ".concat(this.params.model));
            },
            link: function link() {
              if (!this.params.data) return "";
              return "/".concat(this.params.baseRoutePath, "/").concat(this.params.data.id, "/edit");
            },
            color: "warning",
            icon: "edit"
          }]
        }
      }],
      items: [],
      selectedUserIds: []
    };
  },
  mounted: function mounted() {
    var _this = this;

    window.defFuncs = {
      add: function add() {
        alert("Add();");
      }
    };
    var CMPClass = Vue.extend(_AddUsers_vue__WEBPACK_IMPORTED_MODULE_8__["default"]);
    var instance = new CMPClass();
    instance.$mount();
    _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default()(".ag-grid-table-actions-right").prepend(instance.$el);
    _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default()(instance.$el).click( /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
      var data;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              console.log("added");

              _this.findUsers();

              _context.next = 4;
              return _this.sendUsers();

            case 4:
              data = _context.sent;

              if (data && data.data.success) {
                Iracode.success(_this.__('User Added Successfully'));

                _this.$router.push("/accesslevel/roles/".concat(_this.$route.params.id, "/users"));
              }

            case 6:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })));
  },
  methods: {
    findUsers: function findUsers() {
      var _this2 = this;

      // fill in "selectedUserIds" by selected rows
      this.selectedUserIds = [];
      _node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default()('[ref="eCenterContainer"] > .ag-row').each(function (i, elem) {
        if (_node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default()(elem).find(".ag-checkbox-input-wrapper.ag-checked").length) _this2.selectedUserIds.push(_node_modules_jquery__WEBPACK_IMPORTED_MODULE_1___default()(elem).find(".row-id").data("id"));
      });
    },
    sendUsers: function sendUsers() {
      if (!this.selectedUserIds.length) return null;
      return this.$http.post('/accesslevel/api/role_outusers/assign', {
        role_id: this.$route.params.id,
        users: this.selectedUserIds
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../AccessLevel/Resources/js/roles/AddUsers.vue?vue&type=template&id=de696470& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
    "vx-tooltip",
    { staticClass: "mx-1 larger-icon", attrs: { text: _vm.__("Add Users") } },
    [
      _c("vs-button", {
        attrs: {
          color: "success",
          to: "#",
          type: "filled",
          icon: "icon-check-circle",
          "icon-pack": "feather"
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!../AccessLevel/Resources/js/roles/OutUsers.vue?vue&type=template&id=244949bb& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
    { staticClass: "mb-base index-page", attrs: { id: "ag-grid-demo" } },
    [
      _c(
        "vx-card",
        [
          _vm.shouldShowToolbar
            ? _c("IndexToolbar", {
                attrs: { showCreateButton: false, parent: this }
              })
            : _vm._e(),
          _vm._v(" "),
          _c("ag-grid-vue", {
            ref: "agGridTable",
            staticClass: "ag-theme-material w-100 my-4 ag-grid-table",
            attrs: {
              gridOptions: _vm.gridOptions,
              columnDefs: _vm.columnDefs,
              defaultColDef: _vm.defaultColDef,
              rowSelection: "multiple",
              colResizeDefault: "shift",
              domLayout: "autoHeight",
              animateRows: true,
              modules: _vm.modules,
              localeText: _vm.translations,
              cacheBlockSize: _vm.paginationData.limit,
              rowModelType: _vm.rowModelType,
              pagination: true,
              paginationPageSize: _vm.paginationData.limit,
              suppressPaginationPanel: true,
              frameworkComponents: _vm.frameworkComponents,
              enableRtl: _vm.$vs.rtl,
              overlayLoadingTemplate: _vm.__("loading") + "..."
            },
            on: { "grid-ready": _vm.onGridReady }
          }),
          _vm._v(" "),
          _vm.paginationData.totalPages > 1
            ? _c(
                "div",
                { staticClass: "pagination-wrap vs-pagination-primary" },
                [
                  _c(
                    "button",
                    {
                      staticClass: "vs-pagination--buttons mx-2",
                      on: { click: _vm.gotoFirstPage }
                    },
                    [
                      _c("vs-icon", {
                        attrs: {
                          "icon-pack": "feather",
                          icon: "icon-chevrons-right"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c("vs-pagination", {
                    staticClass: "pagination",
                    attrs: {
                      goto: "",
                      total: _vm.paginationData.totalPages,
                      max: _vm.paginationData.maxPageNumbers
                    },
                    on: { change: _vm.loadPage },
                    model: {
                      value: _vm.paginationData.currentPage,
                      callback: function($$v) {
                        _vm.$set(_vm.paginationData, "currentPage", $$v)
                      },
                      expression: "paginationData.currentPage"
                    }
                  }),
                  _vm._v(" "),
                  _c(
                    "button",
                    {
                      staticClass: "vs-pagination--buttons mx-2",
                      on: { click: _vm.gotoLastPage }
                    },
                    [
                      _c("vs-icon", {
                        attrs: {
                          "icon-pack": "feather",
                          icon: "icon-chevrons-left"
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              )
            : _vm._e()
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);