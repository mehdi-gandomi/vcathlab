<template>
  <vs-dropdown vs-custom-content vs-trigger-click class="cursor-pointer">
    <span class="cursor-pointer flex items-center i18n-locale">
      <img class="h-4 w-5" :src="i18n_locale_img" :alt="locale" />
      <span class="hidden sm:block ml-2">{{ getCurrentLocaleData.lang }}</span>
    </span>
    <vs-dropdown-menu class="w-48 i18n-dropdown vx-navbar-dropdown">
        <vs-dropdown-item @click="updateLocale('fa')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/fa.svg" alt="fa" /> &nbsp;فارسی</vs-dropdown-item>
      <vs-dropdown-item @click="updateLocale('en')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/en.png" alt="en" /> &nbsp;English</vs-dropdown-item>
      <!-- <vs-dropdown-item @click="updateLocale('fr')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/fr.png" alt="fr" /> &nbsp;French</vs-dropdown-item>
      <vs-dropdown-item @click="updateLocale('de')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/de.png" alt="de" /> &nbsp;German</vs-dropdown-item>
      <vs-dropdown-item @click="updateLocale('pt')"><img class="h-4 w-5 mr-1" src="@assets/images/flags/pt.png" alt="pt" /> &nbsp;Portuguese</vs-dropdown-item> -->
    </vs-dropdown-menu>
  </vs-dropdown>
</template>

<script>
export default {
  computed: {
      locale(){
        return this.$i18n.locale;
      },
    i18n_locale_img() {
        const locale = this.$i18n.locale;
        if (locale == "en")      return require(`@assets/images/flags/en.png`)
        else if (locale == "pt") return require(`@assets/images/flags/pt.png`)
        else if (locale == "fr") return require(`@assets/images/flags/fr.png`)
        else if (locale == "de") return require(`@assets/images/flags/de.png`)
        else if (locale == "fa") return require(`@assets/images/flags/fa.svg`)
        else return require(`@assets/images/flags/en.png`)
    },
    getCurrentLocaleData() {
        const locale = this.$i18n.locale;
        console.log(locale)
        if (locale == "en")      return { flag: "us", lang: 'English'    }
        else if (locale == "pt") return { flag: "br", lang: 'Portuguese' }
        else if (locale == "fr") return { flag: "fr", lang: 'French'     }
        else if (locale == "de") return { flag: "de", lang: 'German'     }
        else if (locale == "fa") return { flag: "fa", lang: 'فارسی'     }
    },
  },
  methods: {
    updateLocale(locale) {
      this.$i18n.locale=locale;
    },
  }
}
</script>
