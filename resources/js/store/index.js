import {createStore} from 'vuex';
import api from "../api.js";

const store = createStore({
    state:{
        isAuthenticated: false,
        isAdmin: false,
        persons: [],
        user: null
    },
    mutations: {
        SET_AUTH_STATUS(state, status){
            state.isAuthenticated = status
        },
        SET_ADMIN_STATUS(state, status){
            state.isAdmin = status
        },
        SET_USER(state, user){
            state.user = user
        }
    },
    actions: {
        login({commit}, user) {
            localStorage.setItem('access_token', user.token)
            commit('SET_AUTH_STATUS', true)
        },
        admin({commit}) {
            api.post('/api/auth/me')
                .then ( res => {
                    if(res.data.role === '1') {
                        commit('SET_ADMIN_STATUS', true)
                    }
                    else{
                        commit('SET_ADMIN_STATUS', false)
                    }
                })
        },
        logout({ commit }){
            localStorage.removeItem('access_token')
            commit('SET_AUTH_STATUS', false)
        }
    },
    getters: {
        isAuthenticated: state => state.isAuthenticated,
        isAdmin: state => state.isAdmin
    }
})
export default store;
