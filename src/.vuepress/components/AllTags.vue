<!-- .vuepress/components/TagList.vue -->
<template lang="html">
  <div>
    <v-chip
      v-for="tag in Object.keys(tags)"
      :key="tag"
      :to="`#${tag}`"
      class="secondary ma-2"
    >
      {{tag}}
      <v-avatar
        right
        class="primary"
      >
        {{tags[tag].length}}
      </v-avatar>
    </v-chip>
  </div>
</template>

<script>
export default {
  props: ['type'],
  computed: {
    tags() {
      let tags = {}
      this.$site.pages
        .filter(page => page.frontmatter.type === this.type)
        .forEach(page => {
          (
            (page.frontmatter && page.frontmatter.tags) ||
            []
          )
            .forEach(tag => {
              tags[tag] = tags[tag] || []
              tags[tag].push(page.title)
            })
        })

      return tags
    }
  }
}
</script>