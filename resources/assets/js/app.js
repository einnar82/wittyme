
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import 'babel-polyfill'
import Home from './components/layouts/Home.vue'
import router from './routes'
const app = new Vue({
  el: '#app',
  router,
  data: {

  },
  render: h => h(Home)
})