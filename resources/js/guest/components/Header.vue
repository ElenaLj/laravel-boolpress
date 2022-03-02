<template>
  <header class="header">
      <div class="header__logo">
        <img src="/images/boolpress-logo.png" alt="Boolpress logo" class="header__image">
        <h2 class="header__text">Boolpress: a food blog</h2>
      </div>
      
      <nav>
        <ul class="header__list">
          <li>
            <router-link :to="{ name: 'home' }" class="header__links">Home</router-link> 
          </li>
          <li>
            <router-link :to="{ name: 'about' }" class="header__links" id="about">About</router-link> 
          </li>
          <li>
            <router-link :to="{ name: 'categories' }" class="header__links">Categorie</router-link> 
          </li>

          <a href="/admin/home" class="header__login">Login</a>
        </ul>
      </nav>
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
  border-bottom: 3px dotted $color-primary;

    &__logo {
      padding: .3125rem;
      font-size: 2.5rem;
      text-align: center;
      color: $color-primary;
      flex-grow: 1;
      display: flex;
      align-items: center;
    }

    &__image {
      height: 9.375rem;
    }

    &__text {
      height: fit-content;
    }

    &__login {
      color: $color-primary;
      font-size: 1.875rem;
      padding: 1.25rem;
      margin-bottom: -3px;
    }

    nav {
      display: flex;
    }

    &__list {
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
      border-bottom: 3px solid $yellow-dark;
    }

    #about {
      margin: 0 .9375rem;
    }
}
</style>