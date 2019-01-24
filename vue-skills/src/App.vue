<template>
  <div id="app">
    <nameform></nameform>
    
  </div>
</template>

<script>
import Form from './components/NameForm.vue'

export default {
  name: 'app',
  components: {
    nameform
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
