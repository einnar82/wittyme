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
    <!-- <div v-for="(question, index) in s"
          :key="index"> -->
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
            <div class="picture elevation-1" :style="`background: url('/storage/photoword/${selectedQuestion.image_question}')no-repeat;`"/>
          </v-flex>
        </v-layout>
      </v-container>
      <v-container fluid=true align-center=true>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
                <v-btn round color="primary" dark @click="select">{{selectedQuestion.choice1}}</v-btn>
              </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{selectedQuestion.choice2}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{selectedQuestion.choice3}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
        <v-layout row wrap>
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
              <v-btn round color="primary" dark @click="select">{{selectedQuestion.answer}}</v-btn>
            </div>
          </v-flex>
        </v-layout>
      </v-container>
    <!-- </div> -->
  </div>
</template>

<script>
import axios from 'axios'
import shuffle from 'shuffle-array'
export default {
  name:'Photoword',
  data () {
    return {
      questions: [],
      selectedQuestion: null,
      choices: [],
      usedQuestions: []
    }
  },
  methods: {
    select() {
      this.$swal('Hello word!');
    },
    getAllQuestions () {
      axios.get('/questions/photoword')
        .then(response => {
          this.questions = response.data
          this.selectedQuestion = shuffle.pick(this.questions, {'picks': 1});
          console.log(this.selectedQuestion);
           this.getChoices(this.selectedQuestion)
        })
    },
    getChoices (object) {
      for(let index in object) { 
          if (index == 'choice1' || index == 'choice2' || index == 'choice3' || index == 'answer') {
            this.choices.push(object[index]);
          }
      }
      console.log(this.choices);
    } 
  },
  mounted () {
    this.getAllQuestions();
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
