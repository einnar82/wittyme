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
    <div v-for="(question, index) in questions"
          :key="index">
     <v-container fluid=true>
        <v-layout row wrap>
          <v-flex align-center="true">
            <p class="headline text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
            Direction: Guess the picture according to their action.
            </p>
          </v-flex>
        </v-layout>
      </v-container>
      <v-container fluid=true>
        <v-layout row wrap>
          <v-flex>
            <div class="picture elevation-1" :style="`background: url('/storage/photoword/${question.image_question}')no-repeat;`"/>
          </v-flex>
        </v-layout>
      </v-container>
      <v-container fluid=true align-center=true>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
                <v-btn round color="primary" dark @click="select">{{question.choice1}}</v-btn>
              </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{question.choice2}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{question.choice3}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{question.answer}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
      </v-container>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name:'Photoword',
  data () {
    return {
      questions: []
    }
  },
  methods: {
    select() {
      this.$swal('Hello word!');
    },
    getAllQuestions () {
      axios.get('/questions/photoword')
        .then(response => {
          this.questions = response.data.data
          console.log(this.questions);
        })
    }
  },
  mounted () {
    this.getAllQuestions()
  }
}
</script>

<style scoped lang="scss">
.picture {
  height: 200px;
  width: 200px;
  background-size: contain;
  margin: 0 auto;
}
</style>
