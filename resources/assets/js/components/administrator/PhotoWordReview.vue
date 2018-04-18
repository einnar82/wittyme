<template>
  <v-container fluid=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md6 lg6 xl6>
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
        set(value) {
          this.$store.state.photoword.correct = value
        }
    },
  },
  methods: {
    fileSelectedFunc(e) {
      this.$store.state.photoword.fileName = e.name;
    }
  },
  components: {
    UploadButton
  }
}
</script>

<style scoped lang="scss">

</style>
