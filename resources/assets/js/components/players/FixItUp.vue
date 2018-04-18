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
            Direction:  Arrange the jumbled words to make the sentence correct.
          </p>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container fluid=true>
      <v-layout row wrap>
        <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
          <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
            island No an one is
          </p>
        </v-flex>
      </v-layout>
    </v-container>
    <v-container>
      <v-layout row wrap>
        <v-flex>
          <v-text-field xs12 sm12 md12 lg12 xl12 align-center=true
          name="answer"
          label="Your answer"
          id="answer"
          v-model="answer">
          </v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  name: 'FixItUp',
  data () {
    return {
      answer: '',
    }
  },
  methods: {
    select() {
      this.$swal('Hello World');
    }
  }
}
</script>

<style scoped lang="scss">

</style>
