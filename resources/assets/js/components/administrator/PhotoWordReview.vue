<template>
  <v-container fluid=true grid-list-{xs through xl}=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md4 lg4 xl4 class="elevation-6 pa-3 mb-3">
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
                      :name="`choice${index + 1}`"
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
                    @click.native="send"
                    :disabled="loading"
                    v-if="isSaved">
              Save Question
              <span slot="loader" class="custom-loader">
                <v-icon light>cached</v-icon>
              </span>
              </v-btn>
            <v-btn  color="info"
                    :loading="loading"
                    @click.native="update"
                    :disabled="loading"
                    v-if="isUpdated">
              Update Question
              <span slot="loader" class="custom-loader">
                <v-icon light>cached</v-icon>
              </span>
              </v-btn>
          </div>
      </v-flex> 
      <v-flex hidden-sm-and-down md1 lg1 xl1>
        
      </v-flex>
      <v-flex xs12 sm12 md7 lg7 xl7 class="mb-3">
        <v-flex xs12 sm12 md12 lg12 xl12>
            <v-card>
              <v-card-title>
                 <p class="headline">List of Questions</p>
              <v-spacer></v-spacer>
              <v-text-field
                append-icon="search"
                label="Search"
                single-line
                hide-details
                v-model="search"
              ></v-text-field>
            </v-card-title>
            <v-data-table
              :headers="headers"
              :items="items"
              :search="search"
            >
              <template slot="items" slot-scope="props">
                <td><img :src="`/storage/photoword/${props.item.image_question}`" class="max-image"></td>
                <td class="text-xs-right">{{ props.item.choice1 }}</td>
                <td class="text-xs-right">{{ props.item.choice2 }}</td>
                <td class="text-xs-right">{{ props.item.choice3 }}</td>
                <td class="text-xs-right">{{ props.item.answer }}</td>
                <td class="justify-center layout px-0">
                  <v-btn icon class="mx-0" @click="editItem(props.item)">
                    <v-icon color="teal">edit</v-icon>
                  </v-btn>
                  <v-btn icon class="mx-0" @click="deleteItem(props.item)">
                    <v-icon color="pink">delete</v-icon>
                  </v-btn>
                </td>
              </template>
              <v-alert slot="no-results" :value="true" color="error" icon="warning">
                Your search for "{{ search }}" found no results.
              </v-alert>
            </v-data-table>
            </v-card>
        </v-flex>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import UploadButton from '../ui/UploadButton'
import axios from 'axios'
export default {
  name: 'PhotowordReview',
  data () {
    return {
        fileName: 'Insert image!',
        correct: '',
        loading: false,
        loader: null,
        choices: [
          {no:1, textNode: ''},
          {no:2, textNode: ''},
          {no:3, textNode: ''}
        ],
        search: '',
        headers: [
          {
            text: 'Image',
            align: 'left',
            sortable: false,
            value: 'image'
          },
          { text: 'Choice 1', value: 'choice1' },
          { text: 'Choice 2', value: 'choice2' },
          { text: 'Choice 3', value: 'choice3' },
          { text: 'Answer', value: 'answer' },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        items: [],
        image: null,
        isSaved: true,
        isUpdated: false,
        item: null,
        theForm: new FormData(),
    }
  },
  computed: {

  },
  methods: {
    fileSelectedFunc(e) {
      console.log(e);
      this.fileName = e.name
      this.image = e
    },
    editItem(item) {
      this.isSaved = false
      this.isUpdated = true
      this.choices[0].textNode = item.choice1
      this.choices[1].textNode = item.choice2
      this.choices[2].textNode = item.choice3
      this.correct = item.answer,
      this.item = item
    },
    deleteItem(item) {
      console.log(item);
      axios.delete(`/actions/photoword/${item.id}`)
        .then(response => {
          console.log(response);
          this.get();
        });
    },
    send() {
      this.loader = 'loading'
      this.theForm.append('image_question', this.image)
      this.theForm.append('choice1', this.choices[0].textNode)
      this.theForm.append('choice2', this.choices[1].textNode)
      this.theForm.append('choice3', this.choices[2].textNode)
      this.theForm.append('answer', this.correct)
      const config = {
        headers: {
          'Content-type': 'multipart/form-data'
        }
      }
      axios.post('/actions/photoword', this.theForm, config)
          .then(response => {
            console.log(response);
            this.image = this.correct = ''
            this.fileName = 'Insert image!'
            this.choices.forEach(result => {
              result.textNode = ''
            });
            this.get();
      })
    },
    get() {
      axios.get('/actions/photoword')
        .then(response => {
          this.items = []
          this.items = response.data;
        });
    },
    update () {
      this.loader = 'loading'
      this.theForm.append('image_question', this.image)
      this.theForm.append('choice1', this.choices[0].textNode)
      this.theForm.append('choice2', this.choices[1].textNode)
      this.theForm.append('choice3', this.choices[2].textNode)
      this.theForm.append('answer', this.correct)
      const config = {
        headers: {
          'Content-type': 'multipart/form-data'
        }
      }
      axios.post(`/actions/photoword/${this.item.id}`, this.theForm, config)
        .then(response => {
            this.image = this.correct = ''
            this.fileName = 'Insert image!'
            this.choices.forEach(result => {
              result.textNode = ''
            });
          this.get();
          this.isSaved = true
          this.isUpdated = false
        })
    }
  },
  watch: {
    loader () {
        const l = this.loader
        this[l] = !this[l]
        setTimeout(() => (this[l] = false), 2000)
        this.loader = null
    }
  },
  components: {
    UploadButton
  },
  mounted() {
    this.get();
  }
}
</script>

<style scoped lang="scss">
.max-image {
  max-width: 50px;
  max-height: 50px;
}
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
