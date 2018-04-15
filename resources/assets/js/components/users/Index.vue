<template>
<div>
  <v-container fluid=true class="svg">
    <v-layout row wrap>
      <v-flex xs12 sm12 md6 lg6 xl6>
        <p class="text-md-justify display-3 white--text mt-4">Are you having trouble with English?</p>
        <p class="text-md-justify display-1 white--text mt-4">WittyMe is a web application inspired by your dictionary. From tired reading to interactive learning.</p>
      </v-flex>
      <v-flex xs12 sm12 md6 lg6 xl6>
         <v-form v-model="valid" ref="form" lazy-validation class="white">
            <v-text-field
              label="Name"
              v-model="name"
              :rules="nameRules"
              :counter="10"
              required
            ></v-text-field>
            <v-text-field
              label="E-mail"
              v-model="email"
              :rules="emailRules"
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
</div>
</template>

<script>
export default {
  name: 'Index',
  data () {
    return {
      name: null,
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters'
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
    }
  }
}
</script>

<style scoped lang="scss">
.svg {
  background: url('/images/download.svg'), #84bbf2;
  height: 500px;
  width: 100%;
}

</style>
