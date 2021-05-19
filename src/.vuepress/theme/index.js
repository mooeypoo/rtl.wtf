module.exports = {
  extend: process.env.SITE_DIR === 'ltr' ? '@vuepress/theme-default' : 'default-rtl'
}