const myMixins = {
  data () {
    return {
      questions: [],
      selectedQuestion: null,
      choices: [],
      usedQuestions: [],
      score: 0,
      questionNumber: 0
    }
  },
  methods: {
    select(choice) {
      if (this.selectedQuestion.answer == choice) {
        this.$swal('Correct!');
        this.score += 1;
        this.getAllQuestions();
      } else {
        this.$swal('Wrong!');
        this.getAllQuestions();
      }
    },
    getAllQuestions () {},
    getChoices (object) {} 
  },
  mounted () {
    this.getAllQuestions();
  }
}


export default myMixins;