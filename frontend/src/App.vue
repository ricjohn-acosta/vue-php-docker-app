<template>
  <div class="title-container">
    <span class="title">Dashboard</span>
  </div>
  <div>
    <DashboardContainer />
  </div>
  <Toast />
</template>

<script>
import DashboardContainer from './components/DashboardContainer.vue'
import Toast from 'primevue/toast'

export default {
  name: 'App',
  components: {
    Toast,
    DashboardContainer
  }
}
</script>

<style>
html {
  background: #f6f6f6;
}
#app {
  font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif,
  Apple Color Emoji,
  Segoe UI Emoji, Segoe UI Symbol;
  background: #f6f6f6;
}
body {
  margin: 0px;
}
.title-container {
  background: #208be0;
  padding: 20px;
  margin-bottom: 50px;
}
.title {
  font-size: 2.8rem;
  font-weight: bolder;
  margin-left: 20%;
  margin-right: 20%;
  color: white;
}
</style>
