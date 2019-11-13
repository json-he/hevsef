import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// this.$store.commit('activity')或this.store.commit('newNum',6);
// this.$store.state.showTab
// this.$store.dispatch('activityTab')或this.$store.dispatch('getNewNum'，6)
export default new Vuex.Store({
  state: {
    showTab:true,
    demoNumber:0
  },
  mutations: {
    activity(state){
      state.showTab = true;
    },
    newNum(state,sum){
      state.demoNumber+=sum;
    }
  },
  actions: {
    activityTab(context){
      context.commit('activity')
    },
    getNewNum(context,num){
      context.commit('newNum',num)
    }
  }
})
