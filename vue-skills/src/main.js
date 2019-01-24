import Vue from 'vue'
import App from './App.vue'
// import VueRouter from 'vue-router'
// import VueResource from 'vue-resource'
Vue.config.productionTip = false

// Vue.use(VueResource)
// Vue.use(VueRouter)

// const router = new VueRouter({
//   mode:'history',
//   base:__dirname,
//   routes:[
//     {path:'/', component:'home'},
//     {path:'/about', component:'about'}

//   ]
// })

// new Vue({
//   template: `
//     <div id="app">
//       <router-view></router-view>    
//     </div>
//   `
// })

new Vue({
  render: h => h(App),
}).$mount('#app')
