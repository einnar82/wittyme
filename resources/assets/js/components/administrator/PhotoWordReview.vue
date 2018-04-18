<template>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md4 lg4 xl4 class="elevation-6 pa-3">
        <p class="headline text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Add your questions:
        </p>
        <v-text-field
          name="fileName"
          label="File Name"
          :value="fileName"
          disabled
        ></v-text-field>
        <upload-button title="Upload Image" :selectedCallback="fileSelectedFunc">
        </upload-button>
        <p class="headline pt-2 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Type the choices:
        </p>
        <v-text-field v-for="(choice, index) in choices"
                      :key="choice.no"
                      name="choice"
                      :label="`Choice Number ${choice.no}`"
                      v-model="choices[index].textNode"/>
        <p class="headline pt-1 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Your Answer:
        </p>
        <v-text-field name="answer"
                      label="Answer"
                      v-model="correct"/>
          <div class="text-xs-center">          
            <v-btn  color="info"
                    :loading="loading"
                    @click.native="loader = 'loading'"
                    :disabled="loading">
              Save Question
              <span slot="loader" class="custom-loader">
                <v-icon light>cached</v-icon>
              </span>
              </v-btn>
          </div>
      </v-flex> 
    </v-layout>
  </v-container>
</template>

<script>
import UploadButton from '../ui/UploadButton'
export default {
  name: 'PhotowordReview',
  computed: {
    fileName () {
      return this.$store.state.photoword.fileName;
    },
    choices () {
      return this.$store.state.photoword.choices;
    },
    correct: {
        get () { 
          return this.$store.state.photoword.correct; 
        },
        set (value) {
          this.$store.state.photoword.correct = value
        }
    },
    loading: {
      get () {
         return this.$store.state.photoword.loading;
      },
      set (value) {
        this.$store.state.photoword.loading = value
      }
     
    },
    loader: {
      get () {
        return this.$store.state.photoword.loader;
      },
      set (value) {
        this.$store.state.photoword.loader = value
      }
    }
  },
  methods: {
    fileSelectedFunc(e) {
      this.$store.state.photoword.fileName = e.name;
    }
  },
  watch: {
    loader () {
        const l = this.loader
        this[l] = !this[l]

        setTimeout(() => (this[l] = false), 3000)

        this.loader = null
    }
  },
  components: {
    UploadButton
  }
}
</script>

<style scoped lang="scss">
  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>
