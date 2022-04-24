const webpack = require('webpack');
const meta = (name, content, props = {}) => {
  return ['meta', { name, content, ...props }]
}
const ogprefix = 'og: http://ogp.me/ns#'

module.exports = {
  theme: process.env.SITE_DIR === 'ltr' ? '' : 'default-rtl',
  /**
   * Ref：https://v1.vuepress.vuejs.org/config/#title
   */
  title: process.env.SITE_DIR === 'ltr' ? 'LTR:WTF' : 'RTL:WTF',
  /**
   * Ref：https://v1.vuepress.vuejs.org/config/#description
   */
  description: "A one-stop-shop for explanation about Right to Left languages online.",

  /**
   * Extra tags to be injected to the page HTML `<head>`
   *
   * ref：https://v1.vuepress.vuejs.org/config/#head
   */
  head: [
    ['meta', { name: 'theme-color', content: '#3eaf7c' }],
    ['meta', { name: 'apple-mobile-web-app-capable', content: 'yes' }],
    ['meta', { name: 'apple-mobile-web-app-status-bar-style', content: 'black' }],
    ['link', { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'}],

    ['link', { rel: "icon", type: "image/png", sizes: "32x32", href: "ico-shuffle-32x32.png"}],
    ['link', { rel: "icon", type: "image/png", sizes: "16x16", href: "ico-shuffle-16x16.png"}],
    ['link', { rel: "shortcut icon", href: "favicon.ico"}],    
  ],

  // globalLayout: '/.viepress/theme/layouts/GlobalLayout.vue',
  /**
   * Theme configuration, here is the default theme configuration for VuePress.
   *
   * ref：https://v1.vuepress.vuejs.org/theme/default-theme-config.html
   */
  themeConfig: {
    repo: 'https://github.com/mooeypoo/rtl.wtf',
    domain: process.env.SITE_DIR === 'ltr' ? 'https://ltr.wtf' : 'https://rtl.wtf',
    author: 'Moriel Schottlender',
    docsDir: 'src',
    editLinks: false,
    editLinkText: 'Suggest changes to this page',
    lastUpdated: true,
    nav: [
      {
        text: 'Resources',
        link: '/explained/',
      },
      {
        text: 'Intro to BiDi',
        link: '/explained/bidiintro.md',
      },
      {
        text: 'BiDi in the Wild',
        link: '/inthewild/',
      },
      {
        text: 'Talks',
        link: '/talks/',
      },
      {
        text: 'Contact',
        link: '/contact/'
      }
    ],
    sidebar: {
      '/explained/': [
        {
          title: 'Resources',
          collapsable: false,
          children: [
            ''
          ]
        },
        {
          title: 'RTL Tools & Demos',
          collapsable: true,
          children: [
            'tools/multistringisolation'
          ]
        },
        {
          title: 'RTL Explained',
          collapsable: true,
          children: [
            'bidiintro',
            'rtlhistory'
          ]
        },
        {
          title: 'RTL Talks',
          collapsable: true,
          children: [
            '/talks/2018-08-23-BiDi-WAT',
            '/talks/2017-10-30-Strangeloop',
            '/talks/2016-11-02-linux-conf-au',
            '/talks/2015-11-02-Wikimedia'
          ]
        }
      ],
      '/talks/': [
        {
          title: 'Talks and Presentations',
          collapsable: false,
          children: [
            '',
            '2018-08-23-BiDi-WAT',
            '2017-10-30-Strangeloop',
            '2016-11-02-linux-conf-au',
            '2015-11-02-Wikimedia'
          ]
        }
      ],
    }
  },
  configureWebpack: {
    resolve: {
      alias: {
        '@images': 'images'
      }
    },
    plugins: [
      new webpack.DefinePlugin({
        SITE_IS_RTL: process.env.SITE_DIR !== 'ltr'
      })
    ]
  },
  /**
   * Apply plugins，ref：https://v1.vuepress.vuejs.org/zh/plugin/
   */
  plugins: [
    ['@vuepress/plugin-back-to-top', {}],
    ['@vuepress/plugin-medium-zoom', {}],
    ['@vuepress/last-updated',{}],
    'social-share',
    ['seo', {
      image: ($page, $site) => {
        const image = $page.frontmatter.image || '/angry_tiger-640px.jpg'
        return !image.startsWith('https') ? $site.themeConfig.domain + image : image
      },
      description: $page => $page.frontmatter.summary || 'A one-stop-shop for explanation about Right to Left languages online.',
    }],
    ['@vuepress/blog', {
      sitemap: {
        hostname: process.env.SITE_DIR === 'ltr' ? 'https://rtl.wtf' : 'https://rtl.wtf'
      }
      // directories: [
      //   {
      //     // Unique ID of current classification
      //     id: 'inthewild',
      //     // Target directory
      //     dirname: '_inthewild',
      //     // Path of the `entry page` (or `list page`)
      //     path: '/inthewild/',
      //     itemPermalink: '/inthewild/:slug',
      //   }
      // ]
    }]
  ]
}
