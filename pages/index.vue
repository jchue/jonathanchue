<template>
  <div>
    <a v-if="background.title && background.url" v-bind:href="background.url"
    target="_blank" class="caption full-link">
      <font-awesome-icon v-bind:icon="['fas', 'external-link-alt']"></font-awesome-icon>
      {{ background.title }}
    </a>
    <div v-else-if="background.title" class="caption">
      {{ background.title }}
    </div>
    <div class="main">
      <div class="container">
        <Hello></Hello>
      </div>
    </div>
    <footer class="site-footer">
      Copyright &copy; {{ year }} Jonathan Chue
    </footer>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faExternalLinkAlt } from '@fortawesome/free-solid-svg-icons';

library.add(faExternalLinkAlt);

export default Vue.extend({
  name: 'IndexPage',
  components: {
    FontAwesomeIcon,
  },
  data() {
    return {
      background: {
        path: '',
        position: '',
        title: '',
        url: '',
      },
    };
  },
  computed: {
    year() {
      return new Date().getFullYear();
    },
  },
  async mounted() {
    const photo = await this.getRandomPhoto();

    this.background.path = require(`~/assets/${photo.file}`);
    this.background.position = photo.position;
    this.background.title = photo.title;
    this.background.url = photo.url;

    const styleElement = document.createElement('style');
    styleElement.innerHTML = `html {
      background-image: url('${this.background.path}');
      background-position: center ${this.background.position};
    }`;
    document.head.appendChild(styleElement);
  },
  methods: {
    getPhotos: async function(): Promise<any> {
      const photos = await this.$content()
        .where({ slug: 'photos' })
        .fetch()
        .catch((err) => {
          new Error('Page not found');
        });

      return photos;
    },
    getRandomPhoto: async function() {
      const photos = await this.getPhotos();
      const index = Math.floor(Math.random() * (photos.length - 1));

      return photos[index];
    }
  }
})
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Source+Sans+Pro&display=swap');

$breakpoint-small: 400px;
$breakpoint-med: 480px;

html,
body {
    height: 100%;
}

html {
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-size: cover;
}

body {
  background-image: url('~assets/background.png');
  color: #000;
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-weight: 400;
  margin: 0;
}

h1 {
  font-family: "Roboto Condensed", "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-size: 1.375rem;
  font-weight: normal;
  margin: 0 auto 0.625rem;
  text-transform: uppercase;
}

p {
  margin: 0 0 1rem 0;

  &:last-child {
    margin-bottom: 0;
  }
}

a {
  color: #c19749;
  text-decoration: none;
}

#app {
  height: 100%;
}

.main {
  box-sizing: border-box;
  min-height: 100%;
  padding: 3rem;

  @media (max-width: $breakpoint-small) {
    padding: 2rem;
  }
}

.container {
  background-color: #fff;
  display: inline-block;
  font-size: 0.875rem;
  max-width: 15.625rem;
  padding: 3rem;
  position: relative;
  text-align: center;

  @media (max-width: $breakpoint-small) {
    box-sizing: border-box;
    max-width: none;
    padding: 3rem 2rem 2rem 2rem;
    width: 100%;
  }
}

// Background photo information

.caption {
  background-color: #fff;
  display: block;
  float: right;
  font-size: 0.688rem;
  margin: 0.625rem;
  padding: 0.5rem 0.625rem;
  position: relative;
  transition: color 0.2s, background 0.2s;

  svg {
    margin-right: 0.2rem;
  }

  @media (max-width: $breakpoint-med) {
      display: none;
  }
}

a.caption {
  color: #000;

  &:hover {
    background-color: #000;
    color: #fff;
  }
}

.site-footer {
  bottom: 0.5rem;
  color: #fff;
  font-size: 0.75rem;
  left: 0;
  position: absolute;
  right: 1rem;
  text-align: right;

  @media (max-width: $breakpoint-small) {
    right: 0;
    text-align: center;
  }
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

button,
.button {
  background-color: #000;
  border: none;
  color: #fff;
  font-family: "Roboto Condensed", "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-size: 1rem;
  font-weight: normal;
  padding: 0.625rem;
  text-transform: uppercase;
  transition: background 0.2s;

  &:hover {
    background-color: lighten(#000, 20%);
    cursor: pointer;
  }

  &:active {
    padding: 0.6875rem 0.625rem 0.5625rem 0.625rem;
  }

  &[disabled] {
    background-color: #999;

    &:hover {
      cursor: default;
    }

    &:active {
      padding: 0.625rem;
    }
  }
}

.wide-button {
  box-sizing: border-box;
  display: block;
  left: 0;
  margin: 0 0 0.0625rem 0;
  right: 0;
  width: 100%;
}
</style>
