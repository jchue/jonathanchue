<template>
  <div class="hello">
    <router-link to="/" id="site-title">Jonathan Chue</router-link>

    <ul class="roles">
        <li>Technology Consultant</li>
        <li>Web Developer</li>
        <li>Amateur Photographer</li>
    </ul>

    <hr>

    <ul class="links">
        <li><a href="https://www.linkedin.com/in/jonathan-chue-2b83b233" target="_blank"><font-awesome-icon v-bind:icon="['fab', 'linkedin']"></font-awesome-icon><span class="label">LinkedIn</span></a></li>
        <li><a href="https://github.com/jchue" target="_blank"><font-awesome-icon v-bind:icon="['fab', 'github']"></font-awesome-icon><span class="label">GitHub</span></a></li>
        <li><a href="https://www.instagram.com/jonathanchue/" target="_blank"><font-awesome-icon v-bind:icon="['fab', 'instagram']"></font-awesome-icon><span class="label">Instagram</span></a></li>
        <li><a href="https://twitter.com/jonathanchue" target="_blank"><font-awesome-icon v-bind:icon="['fab', 'twitter']"></font-awesome-icon><span class="label">Twitter</span></a></li>
        <li><a href="https://500px.com/jonathanchue" target="_blank"><font-awesome-icon v-bind:icon="['fab', '500px']"></font-awesome-icon><span class="label">500px</span></a></li>
    </ul>

  </div>
</template>

<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faExternalLinkAlt } from '@fortawesome/free-solid-svg-icons';
import {
  faFlickr,
  faGithub,
  faInstagram,
  faLinkedin,
  faTwitter,
  fa500px,
} from '@fortawesome/free-brands-svg-icons';

library.add(faExternalLinkAlt, faFlickr, faGithub, faInstagram, faLinkedin, faTwitter, fa500px);

export default {
  name: 'Hello',
  components: {
    FontAwesomeIcon,
  },
  props: {
    msg: String,
  },
};
</script>

<style scoped lang="scss">
$breakpoint-small: 400px;
$breakpoint-med: 480px;

#site-title {
  color: #000;
  display: block;
  font-family: "Roboto Condensed", "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-size: 1.375rem;
  font-weight: normal;
  margin: 0 auto 0.625rem;
  text-transform: uppercase;
}

hr {
  background-color: #000;
  border: none;
  height: 1px;
  margin: 0 auto 2rem auto;
  width: 90%;

  @media (max-width: $breakpoint-small) {
    width: 100%;
  }
}

.roles {
  padding-left: 0;
  margin: 0 0 1rem;

  li {
    display: block;
  }
}

.links {
  display: block;
  margin: 0 auto 2rem auto;
  padding: 0;
  position: relative;
  text-align: center;

  li {
    display: inline-block;
    font-size: 1.25rem;
    list-style-type: none;

    @media (max-width: $breakpoint-small) {
      display: block;
      left: 0;
      position: relative;
      text-align: left;
      transition: left 0.15s ease-in-out;

      &:hover {
        left: 0.625rem;
      }
    }

    a {
      color: #000;
      padding: 0 0.625rem;

      @media (max-width: $breakpoint-small) {
          display: block;
          padding: 0.125rem 0;
      }
    }

    .label {
      display: block;
      font-family: Arial;
      font-size: 0.75rem;
      left: 0;
      opacity: 0;
      position: absolute;
      text-align: center;
      right: 0;
      text-transform: uppercase;
      top: 0;
      transition: opacity 0.25s ease-in-out, top 0.2s ease-in-out;
      z-index: -1;

      @media (max-width: $breakpoint-small) {
        display: inline;
        font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
        font-size: 0.875rem;
        font-weight: 400;
        margin-left: 0.5rem;
        opacity: 1;
        position: static;
      }
    }

    &:hover .label {
      opacity: 1;
      top: -1.25rem;
      z-index: 1;
    }
  }
}
</style>
