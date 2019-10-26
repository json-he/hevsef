<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
    <Modal></Modal>
    <todo-list></todo-list>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Modal from './components/modal.vue'
import TodoList from './components/todolist/todolist.vue'

export default {
  name: 'app',
  components: {
    HelloWorld,
    Modal,
    TodoList
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
