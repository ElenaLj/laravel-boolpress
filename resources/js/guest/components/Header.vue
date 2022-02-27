<template>
  <header class="header">
      <h2 class="header__logo">Boolpress</h2>
      <nav class="header__nav">
        <li>
          <router-link :to="{ name: 'home' }" class="header__links">Home</router-link> 
        </li>
        <li>
          <router-link :to="{ name: 'about' }" class="header__links" id="about">About</router-link> 
        </li>
        <li>
          <router-link :to="{ name: 'categories' }" class="header__links">Categorie</router-link> 
        </li>
      </nav>
      <a href="/admin/home" class="header__login">Login</a>
  </header>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

.header {
  border-radius: .9375rem;
  font-family: $font-secondary;
  display: flex;

    &__logo {
      padding: .3125rem;
      font-size: 3rem;
      font-weight: 600;
      text-align: center;
      color: $color-primary;
      flex-grow: 1;
    }

    &__login {
      color: $color-primary;
      font-size: 1.875rem;
      padding: 1.25rem;
      margin-bottom: -3px;
    }

    &__nav {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 1.25rem;
      font-size: 1.875rem;

      li {
        color: $color-primary;
      }
    }

    &__links {
      color: $color-primary;
      padding-bottom: 1.25rem;
    }

    &__links:hover,
    &__login:hover {
      border-bottom: 3px solid $border-header-dark;
    }

    #about {
      margin: 0 .9375rem;
    }
}
</style>