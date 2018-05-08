<template>
      <v-container fluid=true fill-height class="svg-2">
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login your account</v-toolbar-title>
                <v-spacer></v-spacer>
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field prepend-icon="person" 
                                name="email" 
                                label="Email Address" 
                                type="email"
                                v-model="email"/>
                  <v-text-field prepend-icon="lock" 
                                name="password" 
                                label="Password" 
                                id="password" 
                                type="password"
                                v-model="password"/>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" @click="gotoDashboard">Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
</template>

<script>
export default {
  name: 'Login',
  props: {
      source: String
  },
  data () {
    return {
      drawer: null,
      email: '',
      password: ''
    }
  },
  methods: {
    gotoDashboard () {

      axios.post('/auth/login', {
        email: this.email,
        password: this.password
      })
      .then(response => {
        console.log(response.data);
        localStorage.setItem('token', response.data.token);
        window.location.href = '/dashboard';
        this.email = this.password = ''
      })
      .catch(error => {
        this.$swal({
          title: 'Oh noes!',
          text: 'Invalid Username or Password',
          icon: 'error',
        })
      })
    }
  }
}
</script>

<style>

</style>
