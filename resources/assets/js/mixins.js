const myMixins = {
  data () {
    return {
      questions: [],
      selectedQuestion: null,
      choices: [],
      usedQuestions: [],
      score: 0,
      questionNumber: 0,
      interval:null,
      now: 10,
      answer: null,
      typedAnswer: ''
    }
  },
  methods: {
    alertMe(title, text, icon) {
      this.now = 0
      clearInterval(this.interval)
      this.$swal({
        title: title,
        text: text,
        icon: icon,
      })
      .then((willClose) => {
        if (willClose) {
          this.now = 10
          this.getAllQuestions();
        }
      }) 
    },
    select(choice) {
      if (this.selectedQuestion.answer == choice) {
        this.score += 1;
        this.alertMe('Nice one!', 'You clicked a correct answer!', 'success')
      } else {
        this.alertMe('Oh noes!', `This correct answer is ${this.answer}`, 'error')
      }
    },
    runTimer() {
      this.interval = setInterval(() => {
        this.now -= 1
        if (this.now == 0) {
          this.alertMe('Time is up!', `This correct answer is ${this.answer}`, 'error')
        } 
      }, 1000)
    },
    getAllQuestions () {},
    getChoices (object) {} 
  },
  mounted () {
    this.getAllQuestions();
  }
}


export default myMixins;