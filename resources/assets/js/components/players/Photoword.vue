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
            Direction: Guess the picture according to their action.
            </p>
          </v-flex>
        </v-layout>
      </v-container>
      <v-container fluid=true>
        <v-layout row wrap>
          <v-flex>
            <div class="picture elevation-1" 
                :style="`background: url('/storage/photoword/${selectedQuestion.image_question}')no-repeat;`"/>
          </v-flex>
        </v-layout>
      </v-container>
      <v-container fluid=true align-center=true>
        <v-layout row wrap  
                  v-for="(choice, index) in choices" 
                  :key="index">
          <v-flex xs12 sm12 md12 lg12 xl12 align-center=true>
            <div class="text-xs-center">
                <v-btn round 
                      color="primary" 
                      dark 
                      @click="select(choices[index])">{{choices[index]}}</v-btn>
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
  name:'Photoword',
  mixins: [myMixins],
  methods: {
    getAllQuestions () {
      axios.get('/questions/photoword')
        .then(response => {
          this.questions = response.data
          this.selectedQuestion = shuffle.pick(this.questions, {'picks': 1});
          this.questionNumber += 1;
          console.log(this.selectedQuestion);
          this.answer = this.selectedQuestion.answer;
          this.getChoices(this.selectedQuestion)
          this.runTimer();
        })
    },
    getChoices (object) {
      this.choices = [];
      for(let index in object) { 
          if (index == 'choice1' || index == 'choice2' || index == 'choice3' || index == 'answer') {
            this.choices.push(object[index]);
          }
      }
      shuffle(this.choices)
    } 
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
