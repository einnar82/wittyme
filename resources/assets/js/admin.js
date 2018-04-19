import '../js/bootstrap'
import "chart.js";
import "hchs-vue-charts";
Vue.use(window.VueCharts);
import Admin from './components/administrator/Admin.vue'
import router from './routes'

const app = new Vue({
  el: '#app',
  router,
  render: h => h(Admin)
})