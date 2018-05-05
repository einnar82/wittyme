<template>
  <div>
    <v-container fluid=true>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12>
          <v-layout row wrap>
            <v-flex xs4 sm4 md4 lg4 xl4>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
                Score
              </p>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
                100
              </p>
            </v-flex>
            <v-flex xs4 sm4 md4 lg4 xl4>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
               Question
              </p>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
               1 / 10
              </p>
            </v-flex>
            <v-flex xs4 sm4 md4 lg4 xl4>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
                Time
              </p>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
                100
              </p>
            </v-flex>
          </v-layout>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container fluid=true>
      <v-layout row wrap>
        <v-flex align-center="true">
          <p class="headline text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
            Direction:  Give the correct synonym/antonyms of the given word.
          </p>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container fluid=true>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
          <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
            HANDSOME
          </p>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container fluid=true align-center=true>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
           <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">Rounded Button</v-btn>
            </div>
        </v-flex>
      </v-layout>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
          <div class="text-xs-center">
            <v-btn round color="primary" dark @click="select">Rounded Button</v-btn>
          </div>
        </v-flex>
      </v-layout>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
          <div class="text-xs-center">
            <v-btn round color="primary" dark @click="select">Rounded Button</v-btn>
          </div>
        </v-flex>
      </v-layout>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
          <div class="text-xs-center">
            <v-btn round color="primary" dark @click="select">Rounded Button</v-btn>
          </div>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import shuffle from 'shuffle-array'
import myMixins from '../../mixins'
export default {
  name: 'Nymrush',
  mixins: [myMixins],
  methods: {
    select(choice) {},
    getAllQuestions () {
      axios.get('/actions/nymrush')
        .then(response => {
          console.log(response);
        })
    },
    getChoices (object) {}, 
    select(choice) {
      this.$swal('Hello World');
    }
  }
}
</script>

<style scoped lang="scss">

</style>
