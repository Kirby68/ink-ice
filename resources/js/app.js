import { createApp } from 'vue'
import './bootstrap'
import axios from 'axios';
import App from './App.vue'
import router from './router'
import FutureSlider from 'vue-future-slider'
import 'vue-future-slider/dist/vue-future-slider.css'

const app = createApp(App)

app.use(router, FutureSlider)

app.config.globalProperties.axios = axios

app.mount('#vue')
