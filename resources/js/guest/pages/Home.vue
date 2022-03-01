<template>
  <div class="home">
    <h1>Homepage</h1>
    <Posts/>
  </div>
</template>

<script>
import Posts from "../components/Posts.vue";

export default {
    name: "Home",
    components: {
        Posts
    }
}
</script>

<style lang="scss" scoped>
  .home {
    padding: 1.25rem 2.1875rem;
    text-align: justify;
    line-height: 1.6;
  }
</style>