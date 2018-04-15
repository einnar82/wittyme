import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './components/layouts/Home.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Home
  }
]

export default new VueRouter({
  routes,
  mode: 'history'
});