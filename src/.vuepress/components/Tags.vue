<template lang="html">
  <div>
    Tags:
    <v-chip
      v-for="tag in $page.frontmatter.tags"
      :key="tag"
      :to="{ path: `/tags.html#${tag}`}"
      class="ma-2"
    >
      {{tag}}
    </v-chip>
  </div>
</template>