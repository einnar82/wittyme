<template>
  <v-container fluid=true grid-list-{xs through xl}=true>
    <v-layout row wrap>
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
                <td>{{ props.item.synonym }}</td>
                <td class="text-xs-left">{{ props.item.choice1 }}</td>
                <td class="text-xs-left">{{ props.item.choice2 }}</td>
                <td class="text-xs-left">{{ props.item.choice3 }}</td>
                <td class="text-xs-left">{{ props.item.answer }}</td>
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
      <v-flex hidden-sm-and-down md1 lg1 xl1></v-flex>
      <v-flex xs12 sm12 md4 lg4 xl4 class="elevation-6 pa-3 mb-3">
        <p class="headline text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Add your questions:
        </p>
        <v-text-field
          name="synonym"
          label="Words than synonimous"
          v-model="synonym"
        ></v-text-field>
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
                    @click.native="send"
                    :disabled="loading"
                    v-if="isAdd">
              Save Question
              <span slot="loader" class="custom-loader">
                <v-icon light>cached</v-icon>
              </span>
            </v-btn>
            <v-btn  color="info"
                    :loading="loading"
                    @click.native="update"
                    :disabled="loading"
                    v-if="isUpdate">
              Update Question
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
import axios from 'axios'
export default {
  name: 'NymrushReview',
  data () {
    return {
        isAdd: true,
        isUpdate: false,
        synonym: '',
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
          { text: 'Synonym Word', value: 'synonym', align: 'left' },
          { text: 'Choice 1', value: 'choice1', align: 'left' },
          { text: 'Choice 2', value: 'choice2', align: 'left' },
          { text: 'Choice 3', value: 'choice3', align: 'left' },
          { text: 'Answer', value: 'answer', align: 'left' },
          { text: 'Actions', value: 'actions',align: 'left', sortable: false },
        ],
        items: [],
        item: null
    }
  },
  computed: {

  },
  methods: {
    clearAll () {
      this.synonym = this.correct = ''
      this.choices.forEach(result => {
        result.textNode = ''
      });
      this.item = null
      this.isAdd = true
      this.isUpdate = false
    },
    editItem (item) {
        this.synonym = item.synonym
        this.choices[0].textNode = item.choice1
        this.choices[1].textNode = item.choice2
        this.choices[2].textNode = item.choice3
        this.correct = item.answer
        this.isAdd = false
        this.isUpdate = true
        this.item = item
    },
    deleteItem (item) {
      axios.delete(`/actions/nymrush/${item.id}`)
        .then(response => this.get());
    },
    send () {
      this.loader = 'loading'
      axios.post('/actions/nymrush', {
        synonym: this.synonym,
        choice1: this.choices[0].textNode,
        choice2: this.choices[1].textNode,
        choice3: this.choices[2].textNode,
        answer: this.correct
      })
      .then(response => {
        console.log(response);
        this.get();
        this.clearAll();
      });
    },
    get () {
      axios.get('/actions/nymrush')
        .then(response => {
          console.log(response);
          this.items = response.data
        });
    },
    update () {
      this.loader = 'loading'
      axios.put(`/actions/nymrush/${this.item.id}`,
      {
        synonym: this.synonym,
        choice1: this.choices[0].textNode,
        choice2: this.choices[1].textNode,
        choice3: this.choices[2].textNode,
        answer: this.correct
      })
      .then(response => {
        console.log(response);
        this.get();
        this.clearAll();
      });
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
  mounted() {
    this.get();
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
