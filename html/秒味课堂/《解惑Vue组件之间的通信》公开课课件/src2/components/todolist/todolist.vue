<template>
  <section class="todoapp">
    <todo-header></todo-header>
    <todo-content></todo-content>
  </section>
</template>
<script>
  import TodoHeader from './todo-header'
  import TodoContent from './todo-content'
  export default {
    name:'todoList',
    components: {
      TodoHeader,
      TodoContent
    }
  }
</script>
<style scoped>
  @import url('../../assets/css/base.css');
  @import url('../../assets/css/index.css');
</style>

