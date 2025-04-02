import {createStore} from 'vuex';

const store = createStore({
    state:{
        isAuthenticated: false,
        user: null
    },
    mutations: {
        SET_AUTH_STATUS(state, status){
            state.isAuthenticated = status
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
        logout({ commit }){
            localStorage.removeItem('access_token')
            commit('SET_AUTH_STATUS', false)
        }
    },
    getters: {
        isAuthenticated: state => state.isAuthenticated
    }
})
export default store;
