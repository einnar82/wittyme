<template>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md6 lg6 xl6 row wrap>
        <v-container fluid=true>
          <v-layout row wrap>
            <v-flex xs12 sm12 md12 lg12 xl12>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline">
                Line Chart
              </p>
              <chartjs-line :datalabel="'TestDataLabel'" 
                            :labels="['happy','myhappy','hello']" 
                            :data="[100,40,60]"/>
            </v-flex>
            <v-flex xs12 sm12 md12 lg12 xl12>
                <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline">
                  Bar Chart
                </p>
              <chartjs-horizontal-bar :datalabel="'TestDataLabel'" 
                                      :labels="['happy','myhappy','hello']" 
                                      :data="[100,40,60]"/>
            </v-flex>
          </v-layout>
        </v-container>
      </v-flex>
      <v-flex xs12 sm12 md6 lg6 xl6 row wrap class="pie-margin">
        <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline">
          Pie Chart
        </p>
        <chartjs-pie :datalabel="'TestDataLabel'" 
                      :labels="['happy','myhappy','hello']" 
                      :data="[100,40,60]" 
                      :beginzero="true" 
                      :scalesdisplay="false"
                      :option="{}"/>
        </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'Charts',
  data () {
    return {

    }
  }
}
</script>

<style scoped lang="scss">
.pie-margin {
  margin-top: 100px;
}

@media all and (max-width: 959px) {
  .pie-margin {
    margin-top:0px;
  }
}
</style>
