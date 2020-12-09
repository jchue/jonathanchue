<template>
  <div class="not-found">
    <h1>404</h1>
    <p>Sorry, the requested page could not be found. <a href="#" v-on:click="back">Go back.</a></p>
  </div>
</template>

<script>
export default {
  name: 'Not Found',
  data() {
    return {
      loading: false,
    };
  },
  methods: {
    // Back link
    back() {
      this.$router.go(-1);
    },
    // Add noindex tag for SEO
    notFound() {
      const metaElement = document.createElement('meta');

      metaElement.setAttribute('name', 'robots');
      metaElement.setAttribute('content', 'noindex');
      metaElement.setAttribute('id', 'noindex');

      document.head.appendChild(metaElement);
    },
  },
  mounted() {
    this.notFound();
  },
};
</script>

<style scoped lang="scss">
</style>
