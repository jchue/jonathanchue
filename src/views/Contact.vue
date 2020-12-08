<template>
  <div class="contact">
    <div class="message error" v-if="error">
      {{ errorMessage }}
    </div>
    <div class="message success" v-if="success">
      {{ successMessage }}
    </div>
    <div v-if="loading">
      <font-awesome-icon v-bind:icon="['fas', 'circle-notch']" spin></font-awesome-icon>
      Loading...
    </div>

    <form method="post" name="contactForm"
    v-if="!success && !loading" v-on:submit.prevent="submitForm">
      <label for="first-name">
        First Name
      </label>
      <input type="text" name="first-name" id="first-name" v-model="formData.firstName" required>

      <label for="last-name">
        Last Name
      </label>
      <input type="text" name="last-name" id="last-name" v-model="formData.lastName" required>

      <label for="email">
        Email
      </label>
      <input type="email" name="email" id="email" v-model="formData.email" required>

      <label for="message">
        Message
      </label>
      <textarea name="message" id="message" v-model="formData.message" required></textarea>

      <label for="confirm" class="confirm">
        Confirm
      </label>
      <input type="checkbox" name="confirm" value="confirm" class="confirm"
      v-model="formData.confirm">

      <button type="submit" class="wide-button" v-bind:disabled="!valid">Send</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCircleNotch } from '@fortawesome/free-solid-svg-icons';

library.add(faCircleNotch);

export default {
  name: 'Contact',
  components: {
    FontAwesomeIcon,
  },
  data() {
    return {
      loading: false,
      error: false,
      errorMessage: 'Please correct your errors.',
      success: false,
      successMessage: 'Thank You! Your message has been sent!',
      response: '',
      formData: {
        firstName: '',
        lastName: '',
        email: '',
        message: '',
      },
    };
  },
  computed: {
    valid() {
      return this.formData.firstName
      && this.formData.lastName
      && this.formData.email
      && this.formData.message;
    },
  },
  methods: {
    async submitForm() {
      this.loading = true;
      this.error = false;

      try {
        const url = `${process.env.VUE_APP_SERVICES}/contact`;

        await axios.post(url, this.formData);

        this.loading = false;
        this.success = true;
      } catch (error) {
        this.loading = false;
        this.error = true;
        this.errorMessage = error.response.data.errors[0].detail;
      }
    },
  },
};
</script>

<style scoped lang="scss">
.contact {
  margin-top: 2rem;
}

form {
  text-align: left;
  width: 100%;
}

label {
  display: block;
  font-size: 1rem;
}

input,
textarea {
  background-color: #eee;
  border: none;
  box-sizing: border-box;
  font-family: "Source Sans Pro", Arial, Helvetica, sans-serif;
  font-size: 1rem;
  font-weight: 300;
  margin-bottom: 1rem;
  padding: 0.625rem;
  width: 100%;
}

.message {
  margin-bottom: 2rem;
  padding: 0.625rem;
}

.error {
  background-color: #ffdfdf;
  border: 1px solid #edc4c4;
  color: #ad2929;
}

.success {
  background-color: #ecffde;
  border: 1px solid #d5edc4;
  color: #61ad2a;
  margin-bottom: 0;
}

.confirm {
    display: none;
}
</style>
