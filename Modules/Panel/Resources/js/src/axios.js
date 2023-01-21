// axios
import axios from 'axios'
import store from "@/store/store.js"
import authService from '@/auth/authService'
const domain = ""
const headers={
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
};
// authService.on("loginEvent",e=>{
//     if(!e.loggedIn) headers['Authorization']="";
// })
const instance= axios.create({
  domain,
  headers,
  withCredentials: true
  // You can add your headers here
})
instance.interceptors.response.use(
    response => response,
    error => {
        console.log(error.config);
      //if set error handler to false, then dont show alert
      if(error.config &&  error.config.handleErrors == false ) {
            return Promise.reject(error);
      }
      const { status } = error.response
      if(status == 404) {
          window.Iracode.goto("/error-404")
          return Promise.reject(error)
      }
      // Show the user a 500 error
      if (status >= 500) {
        // Iracode.$emit('error', error.response.data.message)
        window.Iracode.goto("/error-500")
        return Promise.reject(error)
      }


      // Handle Session Timeouts
      if (status === 401) {
        localStorage.removeItem("vuex");
        localStorage.removeItem("_secure__ls__metadata");
        window.location.href=`${window.config.login_url}`;
        return Promise.reject(error)
      }

      // Handle Forbidden
      if (status === 403) {
        window.Iracode.goto({ name: 'page-not-authorized' })
        return Promise.reject(error)
      }
      window.Iracode.error(error.response.data.message ? error.response.data.message:error.message)
      // Handle Token Timeouts
    //   if (status === 419) {
    //     Iracode.$emit('token-expired')
    //   }

      return Promise.reject(error)
    }
  )

export default instance

