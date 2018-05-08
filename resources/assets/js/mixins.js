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
        if (willClose == true || willClose == null) {
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
    checkToken() {
      if (localStorage.getItem('token') === null || localStorage.getItem('token') === '') {
        window.location.href= '/login'
      }
    },
    getAllQuestions () {},
    getChoices (object) {} 
  },
  mounted () {
    this.checkToken();
    this.getAllQuestions();
  }
}


export default myMixins;