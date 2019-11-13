<template>
  <div>
    <router-link to="/">主页</router-link>     //切换到指定的组件
    <router-link to="/main">主页</router-link>
    <router-link to="/admin">管理页</router-link>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'TestRouter',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
