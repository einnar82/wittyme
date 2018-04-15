import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './components/users/Index.vue'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Index
  },
  
]

export default new VueRouter({
  routes,
  mode: 'history'
});