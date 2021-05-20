<template>
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
      return SITE_IS_RTL ? 'Switch content to LTR' : 'Switch content to RTL'
    },
    switchButtonClass () {
      return SITE_IS_RTL ? 'text-left' : 'text-right'
    },
    switchButtonHref() {
      return (SITE_IS_RTL ? 'https://ltr.wtf' : 'https://rtl.wtf') + this.$page.regularPath
    }
  }
}
</script>

<style>
.footer-vuetify-app .v-application--wrap {
  min-height: auto !important;
}
</style>