<template>
  <v-app id="inspire">
    <v-navigation-drawer app v-model="drawer">
      <v-toolbar flat>
        <v-list>
          <v-list-tile>
            <v-list-tile-title class="title">
              WittyMe
            </v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-toolbar>
      <v-divider></v-divider>
      <v-list dense class="pt-0">
        <v-list-tile v-for="item in items" :key="item.title" @click="">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon class="hidden-md-and-up" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>WittyMe</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat>Home</v-btn>
        <v-btn flat>About</v-btn>
        <v-btn flat>Contact Us</v-btn>
        <v-btn flat>Register</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer color="indigo" app>
      <span class="white--text text-center">All Rights Reserved &copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: 'Home',
  data () {
    return {
      drawer: null,
      items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'About', icon: 'question_answer' },
          { title: 'Contact Us', icon: 'perm_contact_calendar' },
          { title: 'Register', icon: 'add_circle_outline' }
      ]
    }
  }
}
</script>

<style>

</style>
