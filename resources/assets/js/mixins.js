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
    select(choice) {},
    getAllQuestions () {},
    getChoices (object) {} 
  },
  mounted () {
    this.getAllQuestions();
  }
}


export default myMixins;