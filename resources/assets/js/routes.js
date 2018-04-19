import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './components/users/Index.vue'
import Login from './components/users/Login.vue'
import Dashboard from './components/players/Dashboard.vue'
import Photoword from './components/players/Photoword.vue'
import Nymrush from './components/players/Nymrush.vue'
import FixItUp from './components/players/FixItUp.vue'
import Admin from './components/administrator/Admin.vue'
import Charts from './components/administrator/Charts.vue' 
import PhotowordReview from './components/administrator/PhotoWordReview.vue'
import NymrushReview from './components/administrator/NymrushReview.vue'
import FixItUpReview from './components/administrator/FixItUpReview.vue'
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
  {
    path: '/photoword',
    component: Photoword
  },
  {
    path: '/nymrush',
    component: Nymrush
  },
  {
    path: '/fixitup',
    component: FixItUp
  },
  {
    path: '/administrator',
    component: Admin,
    children: [
      {
        path: '/',
        component: Charts
      },
      {
        path: 'photoword',
        component: PhotowordReview
      },
      {
        path: 'nymrush',
        component: NymrushReview
      },
      {
        path: 'fixitup',
        component: FixItUpReview
      }
    ]
  },
]

export default new VueRouter({
  routes,
  mode: 'history'
});