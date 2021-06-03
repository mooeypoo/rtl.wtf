<template>
  <v-app>
    <ParentLayout>
      <template #page-bottom>
        <v-app class="footer-vuetify-app">
          <v-footer
            class="pa-2"
            color="primary lighten-5"
            padless
            fixed
          >
            <v-row
              justify="center"
              align="center"
              no-gutters
            >
              <v-col
                class="white--text"
                :class="switchButtonClass"
              >

                <v-btn
                  small
                  text
                  :href="switchButtonHref"
                >
                  <v-icon>{{ switchButtonIcon }}</v-icon>
                  {{ switchButtonText }}
                  <v-icon>{{ switchButtonIcon }}</v-icon>
                </v-btn>

              </v-col>
            </v-row>
          </v-footer>
        </v-app>
      </template>
    </ParentLayout>
  </v-app>
</template>

<script>
import ParentLayout from '@parent-theme/layouts/Layout.vue'

export default {
  name: 'Layout',
  components: {
    ParentLayout
  },
  computed: {
    switchButtonIcon () {
      return SITE_IS_RTL ? 'mdi-arrow-right-bold' : 'mdi-arrow-left-bold'
    },
    switchButtonText () {
      return SITE_IS_RTL ? 'This breaks my brain. Switch to LTR!' : 'Give me the RTL experience!'
    },
    switchButtonClass () {
      return SITE_IS_RTL ? 'text-left' : 'text-right'
    },
    switchButtonHref() {
      return (SITE_IS_RTL ? 'https://ltr.wtf' : 'https://rtl.wtf') + this.$page.path
    }
  }
}
</script>

<style>
.footer-vuetify-app .v-application--wrap {
  min-height: auto !important;
}

main.page {
  padding-bottom: 4rem;
}

/* youtube embeds */
.wtfvideo {
  width: 560px;
  height: 315px;
}

@media screen and (max-width: 420px) {
.wtfvideo {
  width: 320px;
  height: 180px;
}
}

/* Overrides */
textarea {
  border: 1px solid #cccccc;
  border-radius: 5px;
  padding: 5px;
}

/* only under 720px */
@media screen and (max-width: 720px) {
  .v-application--is-rtl .sidebar {
    /* Correction to 'translate(-100%)' in the RTL template */
    transform: translate(100%);
  }
}

.v-application--is-rtl .sidebar .nav-links .nav-item,
.v-application--is-rtl .sidebar .nav-links .repo-link {
  /* Flip the padding */
  padding: 0.5rem 1.5rem 0.5rem 0;
}
</style>