
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
      answer: null
    }
  },
  methods: {
    alertMe(title, text, icon) {
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
        this.now = 0
        this.score += 1;
        this.alertMe('Nice one!', 'You clicked a correct answer!', 'success')
        clearInterval(this.interval)
      } else {
        this.now = 0
        this.alertMe('Oh noes!', `This correct answer is ${this.answer}`, 'error')
        clearInterval(this.interval)
      }
    },
    runTimer() {
      this.interval = setInterval(() => {
        this.now -= 1
        if (this.now == 0) {
          clearInterval(this.interval)
          this.alertMe('Time is up!', `This correct answer is ${this.answer}`, 'error')
        } 
      }, 1000)
    },
    getAllQuestions () {},
    getChoices (object) {} 
  },
  computed: {
    timer() {}
  },
  mounted () {
    this.getAllQuestions();
  }
}


export default myMixins;