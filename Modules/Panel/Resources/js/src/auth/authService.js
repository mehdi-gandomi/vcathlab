import EventEmitter from 'events'

import store from "@/store/store.js"
import axios from '@/axios';
// 'loggedIn' is used in other parts of application. So, Don't forget to change there also
const localStorageKey = 'loggedIn';

const tokenExpiryKey = 'tokenExpiry';
const loginEvent = 'loginEvent';

class AuthService extends EventEmitter {
    idToken = null;
    profile = null;
    tokenExpiry = null;

    // Starts the user login flow
    login(customState) {
        // webAuth.authorize({
        //     appState: customState
        // });
    }

    // Handles the callback request from Auth0
    handleAuthentication(authResult) {
        return new Promise((resolve, reject) => {
            console.log("local",authResult);
            store.commit("auth/SET_BEARER",authResult.accessToken);
            this.localLogin(authResult);
            resolve(authResult.idToken);
        });
    }
    async handleSessionAuthentication(){
        return new Promise(async(resolve, reject) => {
            const {data}=await axios.get(`${window.config.path_prefix}/api/get_user`);
            console.log(data)
            if(data.ok){
                console.log(data.userData);
                store.commit("UPDATE_USER_INFO", {
                    ...data.userData,
                    displayName: data.userData.name,
                    email: data.userData.email,
                    photoURL:data.userData.avatar ? data.userData.avatar:"/images/avatar_generic_118.png", // From Auth
                    status: "online"

                    // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
                    // uid: this.profile.sub
                })

                this.emit(loginEvent, {
                    loggedIn: true,
                    profile: data.userData,
                    state:{}
                });
                resolve();
            }
        });

    }
    localLogin(authResult) {
        this.idToken = authResult.idToken;
        this.profile = authResult.idTokenPayload;
        // console.log(this.profile);
        // return;
        // Convert the JWT expiry time from seconds to milliseconds
        this.tokenExpiry = new Date(this.profile.exp * 1000);
        store.commit("auth/SET_TOKEN_EXPIREY",this.tokenExpiry);

        store.commit("UPDATE_USER_INFO", {
            displayName: this.profile.name,
            email: this.profile.email,
            photoURL:"/images/avatar_generic_118.png", // From Auth
            status: "online"
            // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
            // uid: this.profile.sub
        })

        this.emit(loginEvent, {
            loggedIn: true,
            profile: authResult.idTokenPayload,
            state: authResult.appState || {}
        });
    }

    renewTokens() {
        // reject can be used as parameter in promise for using reject
        return new Promise((resolve) => {
            if (localStorage.getItem(localStorageKey) !== "true") {
                // return reject("Not logged in");
            }

            webAuth.checkSession({}, (err, authResult) => {
                if (err) {
                    // reject(err);
                } else {
                    this.localLogin(authResult);
                    resolve(authResult);
                }
            });
        });
    }

    logOut() {
        store.commit("UPDATE_USER_INFO", {})
        store.commit("auth/SET_BEARER", null)
        store.commit("auth/SET_TOKEN_EXPIREY",0)
        store.commit("auth/SET_LOGIN_RESULT",null)
        localStorage.removeItem("vuex");
        this.idToken = null;
        this.tokenExpiry = null;
        this.profile = null;
        this.emit(loginEvent, { loggedIn: false });
    }

    async isAuthenticated() {
        return new Promise(async(resolve)=>{
            const check= (
                (new Date(Date.now()) < new Date(store.state.auth.tokenExpirey)) &&
                store.getters.isUserLoggedIn
            );
            if(!check) return resolve(false)
            try{
                const {data}=await axios.post(`${window.config.path_prefix}/api/get_user`,null,{handleErrors:false,});
                this.profile = data.idTokenPayload;
                console.log(data,this.profile)
                store.commit("UPDATE_USER_INFO", {
                    displayName: this.profile.name,
                    email: this.profile.email,
                    photoURL:"/images/avatar_generic_118.png", // From Auth
                    status: "online"
                    // providerId: this.profile.sub.substr(0, this.profile.sub.indexOf('|')),
                    // uid: this.profile.sub
                })
                return resolve(true);
            }catch(e){
                console.log("not logged in",e);
                const { status } = e.response;
                if(status == 401){
                    store.commit("UPDATE_USER_INFO", {})
                    return resolve(false);
                }
            }
        })
    }
}

export default new AuthService();
