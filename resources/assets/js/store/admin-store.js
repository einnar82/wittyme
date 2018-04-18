import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    photoword: {
      fileName: 'Insert image!',
      answer1: '',
      answer2: '',
      answer3: '',
      correct: '',
      choices: [
        {no:1, textNode: ''},
        {no:2, textNode: ''},
        {no:3, textNode: ''}
      ],
    }
  },
  mutations: {
    setCorrect: state => {
      return state.photoword.correct;
    }
  }
});