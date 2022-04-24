<template>
  <bdi v-if="bdi">{{displayedValue}}</bdi>
  <span v-else>{{displayedValue}}</span>
</template>

<script>
export default {
  props: ['value', 'bdi', 'parenths'],
  computed: {
    displayedValue() {
      return this.parenths ? `(${this.value})` : this.value;
    }
  }
}
</script>