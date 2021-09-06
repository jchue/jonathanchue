<template>
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
      <router-view v-slot="{ Component }">
        <transition name="fade" mode="out-in">
          <component :is="Component" />
        </transition>
      </router-view>
    </div>
  </div>
  <footer class="site-footer">
    Copyright &copy; {{ year }} Jonathan Chue
  </footer>
</template>

<script>
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faExternalLinkAlt } from '@fortawesome/free-solid-svg-icons';
import Hello from '@/components/Hello.vue';

library.add(faExternalLinkAlt);

export default {
  components: {
    Hello,
    FontAwesomeIcon,
  },
  data() {
    return {
      background: {
        file: '',
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
  watch: {
    $route() {
      /* Clear noindex */
      const noIndex = document.getElementById('noindex');

      if (noIndex) {
        noIndex.remove();
      }
    },
  },
  async mounted() {
    const url = `${process.env.VUE_APP_SERVICES}/photo`;
    const photo = (await axios.get(url)).data.data;

    this.background = photo;

    const styleElement = document.createElement('style');
    styleElement.innerHTML = `html {
      background-image: url('${process.env.VUE_APP_IMAGE_PATH}${this.background.file}');
      background-position: center ${this.background.position};
    }`;
    document.head.appendChild(styleElement);
  },
};
</script>

<style lang="scss">
@import-normalize;
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
  background-image: url('https://www.jonathanchue.com/images/background.png');
  color: #000;
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-weight: 300;
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
  box-sizing: border-box;
  color: #fff;
  font-size: 0.75rem;
  height: 1.25rem;
  margin-top: -1.25rem;
  padding-right: 1rem;
  text-align: right;

  @media (max-width: $breakpoint-small) {
    left: 0;
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
