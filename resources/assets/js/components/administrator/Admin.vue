<template>
  <v-app id="inspire">
    <v-navigation-drawer
      fixed
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-tile @click="">
          <v-list-tile-action>
            <v-icon>insert_photo</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Photoword</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="">
          <v-list-tile-action>
            <v-icon>sort_by_alpha</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>Nymrush</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile @click="">
          <v-list-tile-action>
            <v-icon>text_format</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>FixItUp</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar color="indigo" dark fixed app>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>WittyMe - Administrator</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu bottom right>
          <v-btn icon slot="activator" dark>
            <v-icon>more_vert</v-icon>
            </v-btn>
            <v-list>
        <v-list-tile>
            <v-list-tile-title>Rannie Ollit</v-list-tile-title>
        </v-list-tile>
        <v-list-tile @click="">
            <v-list-tile-title>Logout</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    </v-toolbar>
    <v-content>
      <router-view></router-view>
    </v-content>
    <v-footer color="indigo" app>
      <span class="white--text">&copy; 2017</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: 'Admin',
  props: {
   source: String
  },
  data () {
    return {
      drawer: null
    }
  }
}
</script>

<style>

</style>
