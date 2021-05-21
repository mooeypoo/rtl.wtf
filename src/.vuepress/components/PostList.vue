<!-- .vuepress/components/TagList.vue -->
<template lang="html">
    <v-card
      class="postlist d-flex flex-row mb-6 flex-wrap align-content-space-between align-start"
      flat
      tile
    >
      <v-card
        elevation="2"
        v-for="post in posts"
        max-width="300"
        class="post-item mb-5"
      >
      <v-img
        v-if="post.image"
        :src="$withBase(post.image)"
        height="200px"
      ></v-img>

        <v-card-title>{{post.title}}</v-card-title>
        <v-card-subtitle v-if="post.date">{{post.date}}</v-card-subtitle>
        <v-card-text v-if="post.summary">{{post.summary}}</v-card-text>

        <v-chip
          v-if="post.tags"
          v-for="tag in post.tags"
          :key="tag"
          :to="{ path: `/tags.html#${tag}`}"
          class="ma-2"
        >
          {{tag}}
        </v-chip>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            :to="post.path"
            text
          >
            Read more...
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-card>
</template>

<script>
export default {
  props: ['type'],
  computed: {
    posts() {
      let posts = []

      this.$site.pages
        .filter(page => page.frontmatter.type === this.type)
        .sort((a,b) => new Date(b.frontmatter.date) - new Date(a.frontmatter.date))
        .forEach(page => {
          posts.push({
            title: page.title,
            date: page.frontmatter.date,
            tags: page.frontmatter.tags,
            image: page.frontmatter.image,
            summary: page.frontmatter.summary,
            path: page.path
          })
        })
      return posts
    }
  }
}
</script>

<style>
.theme-default-content {
  max-width: 1000px !important;
  padding: 2rem 1rem !important;
}

.postlist .post-item:not(:first-child) {
  margin-left: 20px;
}

.postlist .post-item .v-card__title {
  word-break: break-word;
}
</style>