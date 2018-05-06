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
                {{score}}
              </p>
            </v-flex>
            <v-flex xs4 sm4 md4 lg4 xl4>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
               Question
              </p>
              <p class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center display-1">
               {{questionNumber}} / 10
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
            {{selectedQuestion.jumbled}}
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
          v-model="answer"
          @keyup.enter="checkAnswer">
          </v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import shuffle from 'shuffle-array'
export default {
  name: 'FixItUp',
  data () {
    return {
      answer: null,
      selectedQuestion: null,
      questionNumber: 0,
      score: 0
    }
  },
  methods: {
    checkAnswer () {
      if (this.selectedQuestion.answer == this.answer) {
        this.$swal('Correct');
        this.score += 1;
        this.getAllQuestions();
        this.answer = ''
      } else {
        this.$swal('Wrong!');
        this.getAllQuestions();
        this.answer = ''
      }
    },
    getAllQuestions () {
      axios.get('/actions/fixitup')
        .then(response => {
          this.selectedQuestion = shuffle.pick(response.data, {'picks': 1})
          this.questionNumber += 1;
          console.log(this.selectedQuestion);
        })
    },
    select() {
      
    }
  },
  mounted () {
    this.getAllQuestions();
  }
}
</script>

<style scoped lang="scss">

</style>
