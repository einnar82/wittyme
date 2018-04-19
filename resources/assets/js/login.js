import '../js/bootstrap'

import Login from './components/auth/Login.vue'
import router from './routes'
const app = new Vue({
  el: '#app',
  router,
  data: {

  },
  render: h => h(Login)
})