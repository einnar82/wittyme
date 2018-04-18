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
      loading: false,
      loader: null,
      choices: [
        {no:1, textNode: ''},
        {no:2, textNode: ''},
        {no:3, textNode: ''}
      ],
    }
  },
  mutations: {
    
  }
});