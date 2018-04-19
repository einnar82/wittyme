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
                <td>{{ props.item.name }}</td>
                <td class="text-xs-right">{{ props.item.calories }}</td>
                <td class="text-xs-right">{{ props.item.fat }}</td>
                <td class="text-xs-right">{{ props.item.carbs }}</td>
                <td class="text-xs-right">{{ props.item.protein }}</td>
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
export default {
  name: 'NymrushReview',
  data () {
    return {
        synonym: '',
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
        search: '',
        headers: [
          {
            text: 'Synonym Word',
            align: 'left',
            value: 'synonym'
          },
          { text: 'Choice 1', value: 'choice1' },
          { text: 'Choice 2', value: 'choice2' },
          { text: 'Choice 3', value: 'choice3' },
          { text: 'Answer', value: 'answer' },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        items: [
          {
            value: false,
            name: 'Frozen Yogurt',
            calories: 159,
            fat: 6.0,
            carbs: 24,
            protein: 4.0,
          }]
    }
  },
  computed: {

  },
  methods: {
    fileSelectedFunc(e) {
      this.fileName = e.name;
    },
    editItem(item) {

    },
    deleteItem(item) {

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