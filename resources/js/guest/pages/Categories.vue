<template>
  <div class="categories">
      <h1>Categories</h1>
      <ul class="categories__list">
          <li v-for="category in categories" :key="category.id" class="categories__item">
              <router-link :to="{name: 'single-category', params: { slug: category.slug}}">{{category.name}}</router-link>
          </li>
      </ul>
  </div>
</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            categories: []
        }
    },
    created() {
        axios.get("/api/categories")
            .then( (response) => {
                this.categories = response.data;
            });
    }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss"; 

  .categories {
    padding: 1.25rem 2.1875rem;
    text-align: justify;
    line-height: 1.6;

    &__list {
        margin: 1.5rem 0;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    &__item {
        padding: 1rem;
        border: 2px dotted $color-border;
        border-radius: .625rem;
    }
    
    &__item:hover {
        color: $color-dark;
        border: 2px solid $color-dark;
        background-color: $background-secondary-light;
        cursor: pointer;
        }
    }
</style>