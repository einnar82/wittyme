<template>
  <div class="btn btn-primary jbtn-file"> {{ title }}<input
    type="file" accept="image/x-png,image/jpg,image/jpeg" v-on:change="fileSelected" name="image_question"></div>
</template>

<script>
  export default {
    name: 'upload-button',
    props: {
      selectedCallback: Function,
      title: String
    },
    methods: {
      fileSelected(e) {
        if (this.selectedCallback) {
          if (e.target.files[0]) {
            this.selectedCallback(e.target.files[0]);
          } else {
            this.selectedCallback(null);
          }
        }
      }
    }
  }
</script>

<style scoped>
  .jbtn-file {
    cursor: pointer;
    position: relative;
    overflow: hidden;
    display: flex;
  }

  .jbtn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    cursor: inherit;
    display: block;
  }
</style>
