/*=========================================================================================
  File Name: moduleAuthMutations.js
  Description: Auth Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios"

export default {
  SET_BEARER(state, accessToken) {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + accessToken
    state.accessToken=accessToken;
  },
  SET_TOKEN_EXPIREY(state, expirey) {
    state.tokenExpirey=expirey;
  },
  SET_LOGIN_RESULT(state, loginResult) {
    state.loginResult=loginResult;
  },
}
