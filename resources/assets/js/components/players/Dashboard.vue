<template>
<div>
  <v-container fluid=true class="banner">
    <v-layout row wrap>
      <v-flex xs12 sm12 md6 lg6 xl6>
        <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">Rannie Ollit</p>
        <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline">einnar82@gmail.com</p>
      </v-flex>
      <v-flex xs12 sm12 md6 lg6 xl6>
        <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">High Score</p>     
        <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline">928</p>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md12 lg12 xl12 align-center>
        <div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center headline white--text categories">Categories</div>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md12 lg12 xl12  class="elevation-4 pa-1">
        <v-layout row wrap>
          <v-flex class="photoword hidden-sm-and-down" md4 lg4 xl4/>
          <v-flex s12 sm12 md8 lg8 xl8>
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left display-2 mt-4">Photoword</p>  
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left headline mt-4">Refresh your mind by supplying
              the correct word in each blank provided.</p>     
            <v-btn large color="primary btn-start"
                        @click="photoword">Start</v-btn>     
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md12 lg12 xl12  class="elevation-4 pa-1">
        <v-layout row wrap>
          <v-flex class="nymrush hidden-sm-and-down" md4 lg4 xl4/>
          <v-flex s12 sm12 md8 lg8 xl8>
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left display-2 mt-4">-Nym Rush</p>  
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left headline mt-4">Expand your vocabulary by
              supplying the correct antonym or synonym of the given word.</p>     
            <v-btn large color="primary btn-start"
                        @click="nymrush">Start</v-btn>     
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md12 lg12 xl12  class="elevation-4 pa-1">
        <v-layout row wrap>
          <v-flex class="fixitup hidden-sm-and-down" md4 lg4 xl4/>
          <v-flex s12 sm12 md8 lg8 xl8>
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left display-2 mt-4">FixItUp</p>  
            <p class="text-xs-center text-sm-center text-md-left text-lg-left text-xl-left headline mt-4">Remember the correct sentence structure
              by arranging the jumbled sentences.</p>     
            <v-btn large color="primary btn-start">Start</v-btn>     
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-container>
</div>
</template>

<script>
export default {
  name: 'Dashboard',
  data () {
    return {

    }
  },
  methods: {
    photoword () {
      window.location.href = '/photoword';
    },
    nymrush () {
      window.location.href = '/nymrush';
    }
  }
}
</script>

<style scoped lang="scss">
.categories {
  width: 300px;
  margin: 0 auto;
  padding: 10px;
  background-color: #544f7b;
}

.photoword {
  background: url(/images/photo.png) no-repeat;
  height: 250px;
  background-size: contain;
}

.nymrush {
  background: url(/images/nym.jpg) no-repeat;
  height: 250px;
  background-size: contain;
}

.fixitup {
  background: url(/images/fix.jpg) no-repeat;
  height: 250px;
  background-size: contain;
}

@media all and (max-width: 959px) {
  .btn-start {
    margin: 0 auto;
    display: flex;
    margin-bottom: 10px;
  }
}
</style>
