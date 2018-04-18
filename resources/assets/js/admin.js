import '../js/bootstrap'
import "chart.js";
import "hchs-vue-charts";
Vue.use(window.VueCharts);
import Admin from './components/administrator/Admin.vue'
import router from './routes'
import {store} from './store/admin-store'
const app = new Vue({
  el: '#app',
  store,
  router,
  render: h => h(Admin)
})