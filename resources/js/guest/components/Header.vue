<template>
  <header>
      <h2>Header</h2>
      <a href="/admin/home">Login</a>
      <nav>
        <li>
          <router-link :to="{ name: 'home' }">Home</router-link> 
        </li>
        <li>
          <router-link :to="{ name: 'about' }">About</router-link> 
        </li>
        <li>
          <router-link :to="{ name: 'categories' }">Categories</router-link> 
        </li>
      </nav>
  </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>

</style>