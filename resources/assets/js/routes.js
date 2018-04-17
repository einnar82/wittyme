import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './components/users/Index.vue'
import Login from './components/users/Login.vue'
import Dashboard from './components/players/Dashboard.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Index
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/dashboard',
    component: Dashboard
  },
]

export default new VueRouter({
  routes,
  mode: 'history'
});