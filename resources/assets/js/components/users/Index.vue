<template>
<div>
  <v-container fluid=true class="svg" wrap>
    <v-layout row wrap>
      <v-flex xs12 sm12 md6 lg6 xl6 class="margin">
        <p class="text-md-justify display-3 white--text mt-4">Are you having trouble with English?</p>
        <p class="text-md-justify display-1 white--text mt-4">WittyMe is a web application inspired by your dictionary. From tired reading to interactive learning.</p>
      </v-flex>
      <v-flex xs12 sm12 md6 lg6 xl6 class="margin">
         <v-form v-model="valid" 
                  ref="form" 
                  lazy-validation class="white form-width"
                  row wrap>
            <p class="text-md-center text-sm-center text-xs-center display-1">Register Now!</p>
            <v-text-field
              label="Name"
              v-model="name"
              :rules="nameRules"
              required
            ></v-text-field>
            <v-text-field
              label="E-mail"
              v-model="email"
              :rules="emailRules"
              required
            ></v-text-field>
            <v-text-field
              label="Password"
              v-model="password"
              type="password"
              :rules="passwordRules"
              required
            ></v-text-field>
            <v-select
              label="Gender"
              v-model="gender"
              :items="sex"
              :rules="[v => !!v || 'Item is required']"
              required
            ></v-select>
            <v-btn
              @click="submit"
              :disabled="!valid"
            >
              submit
            </v-btn>
            <v-btn @click="clear">clear</v-btn>
          </v-form>
      </v-flex>
    </v-layout>
  </v-container>
  <v-container fluid=true class="grey lighten-3">
    <v-layout row wrap>
      <v-flex xs12 sm12 md12 lg12 xl12>
        <p class="text-md-center text-sm-center text-xs-center display-1">We promote digital literacy.</p>
      </v-flex>
      <v-flex xs12 sm12 md4 lg4 xl4 class="card-margin">
        <v-card class="tag">
          <v-icon class="icon-design">dashboard</v-icon>
         <p class="text-md-center text-sm-center text-xs-center headline">Learners will learn more about parts of speech.</p>
        </v-card>
      </v-flex>
      <v-flex xs12 sm12 md4 lg4 xl4 class="card-margin">
        <v-card class="tag">
          <v-icon class="icon-design">question_answer</v-icon>
         <p class="text-md-center text-sm-center text-xs-center headline">Learners will enhance their vocabulary.</p>
        </v-card>
      </v-flex>
      <v-flex xs12 sm12 md4 lg4 xl4 class="card-margin">
        <v-card class="tag">
          <v-icon class="icon-design">add_circle_outline</v-icon>
         <p class="text-md-center text-sm-center text-xs-center headline">It will develop their self-confidence in English.</p>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</div>
</template>

<script>
export default {
  name: 'Index',
  data () {
    return {
      name: null,
      valid: null,
      password: null,
      passwordRules: [
        v => !!v || 'Name is required',
      ],
      nameRules: [
        v => !!v || 'Name is required',
      ],
      email: null,
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'E-mail must be valid'
      ],
      gender: null,
      sex: [
        'Male',
        'Female'
      ]
    }
  },
  methods: {
    clear () {
      this.$refs.form.reset()
    },
    submit () {

    }
  }
}
</script>

<style scoped lang="scss">
.svg {
  background: url('/images/download.svg'), #84bbf2;
  width: 100%;
}

.margin {
  margin-top: 20px;
  .form-width {
    padding: 30px;
    width: 80%;
    margin: 0 auto;
  }
}

.tag {
  padding: 20px;
  margin-left: 15px;
  margin-right: 15px;
  margin-bottom: 15px;
  .icon-design {
    font-size: 6em;
    display: flex;
  }
}


</style>
