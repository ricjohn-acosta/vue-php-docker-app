<template>
  <div class="message-container">
    <div class="message-title-container">
      <span class="title">
        {{ props.title }}
      </span>
    </div>
    <div class="message-title-container">
      <span class="subtitle">
        {{ props.subtitle }}
      </span>
    </div>
  </div>
</template>

<script setup>
import {defineProps} from "vue";

const props = defineProps(['title', 'subtitle'])

</script>

<style scoped>
.message-container {
  padding: 50px;
}
.message-title-container {
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
.title {
  font-size: 1.4rem;
  color: grey;
}
.subtitle {
  font-size: 1rem;
  color: grey;
}
</style>
