import { createApp } from 'vue'
import './bootstrap'
import axios from 'axios';
import App from './App.vue'
import Admin from './Admin.vue'
import router from './router'
import 'vue-future-slider/dist/vue-future-slider.css'
import store from './store'

const app = createApp(App)
const admin = createApp(Admin)

app.use(router)
app.use(store)
admin.use(router)
admin.use(store)

app.config.globalProperties.axios = axios
admin.config.globalProperties.axios = axios

app.mount('#vue')
admin.mount('#admin')
