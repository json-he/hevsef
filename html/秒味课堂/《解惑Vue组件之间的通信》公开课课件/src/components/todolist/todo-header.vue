<template>
  <header class="header" >
      <h1>todos--{{$store.state.n}}</h1>
      <button @click="changeHandle">改变state的值</button>
      <input class="new-todo" placeholder="请输入内容" @keydown="downHandle" />
  </header>
</template>
<script>
  export default {
    name: 'todoHeader',
    methods:{
      downHandle(){
        console.log('直接通知兄弟 content')
        // 发布事件 所有组件共有的对象，对象身上有on emit 
        // 新创建一个 new Vue 也可以使用根实例
        // this.$emit(''); // 只能通知父组件

        //this.$root.$emit('add-todo','新添加的')
        this.$eventBus.$emit('add-todo','新添加的')
      },
      changeHandle(){
        this.$store.commit('changeN',1000)
      }
    }
  }
</script>
