<template>
  <div class="theme-container">
    <div class="theme-default-content">
      <h1 class="notfound-title centered">!ho hU</h1>

      <p class="centered">The Right-to-Left tiger can't find the page you requested. Maybe try something else?</p>
      <div class="angrycat-image centered">
        <img :src="$withBase('/angry_tiger-320px.jpg')" alt="An angry cat that looks like a tiger">
        <div class="angrycat-image-attribution"><a href="https://commons.wikimedia.org/wiki/File:Angry_tiger.jpg">Guyon Morée from Beverwijk, Netherlands</a>, <a href="https://creativecommons.org/licenses/by/2.0">CC BY 2.0</a>, via Wikimedia Commons</div>
      </div>

      <div class="notfound-tip custom-block tip">
        <p class="custom-block-title">RTL Tips</p>
        <p v-html="getTip()"></p>
      </div>

      <div class="gobackhome-button centered">
        <RouterLink to="/">
          Take me home.
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script>
const tips = [
  'You can swap between RTL and LTR alignment in this website by switching between ltr.wtf and rtl.wtf domains. Or by clicking the swap button!',
  'Always set direction to your content, even if it\'s just LTR; your clients may read your content in a RTL-aligned client, esspecially if it is an email.',
  'Beware of CSS absolute positioning rules <code>right: 0</code> and <code>left: 0</code>.',
  'Name your directions "start/end" or "forward/backwards", not "left" and "right" to avoid confusion.'
];
export default {
  methods: {
    getTip () {
      return tips[Math.floor(Math.random() * tips.length)]
    }
  }
}
</script>

<style scoped>
.centered {
  text-align: center;
}
.notfound-title {
  padding-top: 1em;
}
.angrycat-image {
  margin: 2em 0;
}
.angrycat-image-attribution {
  font-size: 70%;
}

.gobackhome-button {
  font-size: 1.5em;
  margin-top: 2em;
}
</style>