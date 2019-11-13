<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <TestRouter />

  </div>
</template>

<script>
  import TestRouter from "./components/TestRouter";
export default {
  name: 'app',
  components: {
    TestRouter
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
