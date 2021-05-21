<template>
  <Tweet :id="id"></Tweet>
</template>

<script>
import { Tweet } from 'vue-tweet-embed/dist'

export default {
  props: ['id'],
  components: { Tweet }
}
</script>