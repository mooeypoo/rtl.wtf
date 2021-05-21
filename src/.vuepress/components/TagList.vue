<!-- .vuepress/components/TagList.vue -->
<template lang="html">
  <div>
    <v-list>
      <div v-for="tag in Object.keys(tags)">
        <h3 :id="tag">
          <router-link
            :to="{ path: `/tags.html#${tag}`}"
            class="header-anchor"
            aria-hidden="true">#</router-link>
          {{tag}}
        </h3>

        <v-list-item-group>
          <v-list-item
            v-for="page in tags[tag]"
            two-line
            :to="{ path: page.path}"            
          >
            <v-list-item-avatar v-if="page.frontmatter.image">
              <v-img :src="$withBase(page.frontmatter.image)"></v-img>
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title>{{ page.title }}</v-list-item-title>
              <v-list-item-subtitle>{{ page.summary }}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>

        <!-- <h3 :id="tag">
          <router-link
            :to="{ path: `/tags.html#${tag}`}"
            class="header-anchor"
            aria-hidden="true">#</router-link>
          {{tag}}
        </h3>
        <ul>
          <li v-for="page in tags[tag]">
            <router-link
              :to="{ path: page.path}">{{page.title}}</router-link>
          </li>
        </ul> -->
      </div>
    </v-list>
  </div>
</template>

<script>
export default {
  props: ['type'],
  computed: {
    tags() {
      let tags = {}
      for (let page of this.$site.pages) {
        if (page.frontmatter.type !== this.type) {
          continue
        }

        for (let index in page.frontmatter.tags) {
          const tag = page.frontmatter.tags[index]
          if (tag in tags) {
            tags[tag].push(page)
          } else {
            tags[tag] = [page]
          }
        }
      }
      return tags
    }
  }
}
</script>