import { createStore } from 'vuex'

export default createStore({
  state: {
    connectStatus: false
  },
  getters: {
  },
  mutations: {
    setStatus(state, nouvelle_valeur) {
      state.connectStatus = nouvelle_valeur;
    }
  },
  actions: {
  },
  modules: {
  }
})
