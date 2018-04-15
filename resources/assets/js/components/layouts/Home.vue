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
        <v-list-tile v-for="item in items" :key="item.title" :to="item.route">
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="blue darken-2" dark fixed app>
      <v-toolbar-side-icon class="hidden-md-and-up" @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>WittyMe</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat v-for="item in items" :key="item.title" :to="item.route">{{item.title}}</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-content>
        <router-view></router-view>
    </v-content>
    <v-footer color="blue darken-2" app>
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
          { title: 'Home', icon: 'dashboard', route: '/' },
          { title: 'About', icon: 'question_answer', route: '/about' },
          { title: 'Contact Us', icon: 'perm_contact_calendar', route: '/contactus' },
          { title: 'Login', icon: 'add_circle_outline', route: '/register' }
      ]
    }
  }
}
</script>

<style>

</style>
