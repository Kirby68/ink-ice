import { createApp } from 'vue'
import './bootstrap'
import axios from 'axios';
import App from './App.vue'
import router from './router'
import 'vue-future-slider/dist/vue-future-slider.css'
import store from './store'

const app = createApp(App)

app.use(router)
app.use(store)

app.config.globalProperties.axios = axios

app.mount('#vue')
