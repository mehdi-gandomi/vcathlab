/*=========================================================================================
  File Name: actions.js
  Description: Vuex Store - actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

const actions = {

    // /////////////////////////////////////////////
    // COMPONENTS
    // /////////////////////////////////////////////

    // Vertical NavMenu
    updateVerticalNavMenuWidth({ commit }, width) {
      commit('UPDATE_VERTICAL_NAV_MENU_WIDTH', width)
    },

    // VxAutoSuggest
    updateStarredPage({ commit }, payload) {
      commit('UPDATE_STARRED_PAGE', payload)
    },

    // The Navbar
    arrangeStarredPagesLimited({ commit }, list) {
      commit('ARRANGE_STARRED_PAGES_LIMITED', list)
    },
    arrangeStarredPagesMore({ commit }, list) {
      commit('ARRANGE_STARRED_PAGES_MORE', list)
    },

    // /////////////////////////////////////////////
    // UI
    // /////////////////////////////////////////////

    toggleContentOverlay({ commit }) {
      commit('TOGGLE_CONTENT_OVERLAY')
    },
    updateTheme({ commit }, val) {
      commit('UPDATE_THEME', val)
    },

    // /////////////////////////////////////////////
    // User/Account
    // /////////////////////////////////////////////

    updateUserInfo({ commit }, payload) {
      commit('UPDATE_USER_INFO', payload)
    },
    updateUserRole({ dispatch }, payload) {
      // Change client side
      payload.aclChangeRole(payload.userRole)

      // Make API call to server for changing role

      // Change userInfo in localStorage and store
      dispatch('updateUserInfo', {userRole: payload.userRole})
    },
    setCurrentResource({ commit }, payload) {
        commit('SET_CURRENT_RESOURCE', payload)
    },
    setFilter({ commit }, payload) {
        commit('SET_CRUD_FILTER_MODEL', payload)
    },
    updateCrudFilter({ commit }, payload) {
        commit('UPDATE_CRUD_FILTER', payload)
    },
    SET_NOTIFICATIONS({commit},payload){
        commit('SET_NOTIFICATIONS', payload)
    }
}

export default actions
