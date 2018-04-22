<template>
  <v-container fluid=true grid-list-{xs through xl}=true>
    <v-layout row wrap>
      <v-flex xs12 sm12 md4 lg4 xl4 class="elevation-6 pa-3 mb-3">
        <p class="headline text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Add your jumbled phrases:
        </p>
        <v-text-field
          name="jumbled"
          label="Jumbled Phrases"
          v-model="jumbled"
        ></v-text-field>
        <p class="headline pt-2 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Type the answer:
        </p>
        <v-text-field
          name="answer"
          label="The correct answer"
          v-model="answer"
        ></v-text-field>
        <p class="headline pt-1 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
          Explanation:
        </p>
        <v-text-field name="explanation"
                      label="Explanation"
                      v-model="explanation"/>
          <div class="text-xs-center">          
            <v-btn  color="info"
                    :loading="loading"
                    @click.native="save"
                    :disabled="loading">
              Save Question
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
                <td>{{ props.item.jumbled }}</td>
                <td class="text-xs-left">{{ props.item.answer }}</td>
                <td class="text-xs-left">{{ props.item.explanation }}</td>
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
import axios from 'axios'
export default {
  name: 'FixItUpReview',
  data () {
    return {
        jumbled: '',
        explanation: '',
        answer: '',
        loading: false,
        loader: null,
        search: '',
        headers: [
          {
            text: 'Jumbled Phrases',
            align: 'left',
            sortable: true,
            value: 'jumbled'
          },

          { text: 'Answer', value: 'answer' },
          { text: 'Explanation', value: 'explanation' },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        items: [],
        item: null
    }
  },
  computed: {

  },
  methods: {
    clearAll () {
      this.jumbled = this.answer = this.explanation = ''
    },
    editItem(item) {
      this.jumbled = item.jumbled
      this.answer = item.answer
      this.explanation = item.explanation
      this.item = item
    },
    deleteItem(item) {

    },
    save () {
      this.loader = 'loading'
      axios.post('/actions/fixitup', {
        jumbled: this.jumbled,
        answer: this.answer,
        explanation: this.explanation
      })
      .then(response => {
        console.log(response);
        this.clearAll();
        this.getAll();
      });
    },
    getAll () {
      axios.get('/actions/fixitup')
        .then(response => {
          this.items = response.data
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
  mounted () {
    this.getAll()
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
