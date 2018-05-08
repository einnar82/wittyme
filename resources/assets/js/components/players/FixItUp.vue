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
                {{now}}
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
          v-model="typedAnswer"
          @keyup.enter="checkAnswer">
          </v-text-field>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import shuffle from 'shuffle-array'
import myMixins from '../../mixins'
export default {
  name: 'FixItUp',
  mixins: [myMixins],
  methods: {
    checkAnswer () {
      if (this.typedAnswer.length !== 0) {
       if (this.selectedQuestion.answer == this.typedAnswer) {
          this.score += 1;
          this.typedAnswer = ''
          this.alertMe('Nice one!', 'You typed a correct answer!', 'success')
        } else {
          this.typedAnswer = ''
          this.alertMe('Oh noes!', `This correct answer is ${this.answer}`, 'error')
        }
      }
    },
    getAllQuestions () {
      axios.get('/actions/fixitup')
        .then(response => {
          this.selectedQuestion = shuffle.pick(response.data, {'picks': 1})
          this.questionNumber += 1;
          console.log(this.selectedQuestion);
          this.answer = this.selectedQuestion.answer
          this.runTimer()
        })
    }
  },
}
</script>

<style scoped lang="scss">

</style>
