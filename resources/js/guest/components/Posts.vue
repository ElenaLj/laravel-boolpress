<template>
    <div class="posts">
        <ul class="posts__list">
            <li v-for="post in posts" :key="post.id" class="posts__card">
                <h4 class="posts__title">{{post.title}}</h4>
                <img :src="`/storage/${post.image}`" :alt="post.title" class="posts__image">
                <p>{{post.content}}</p>
                <p v-if="post.category"><strong>Categoria</strong>: {{post.category.name}}</p>
                <div v-if="post.tags.length > 0">
                    <p><strong>Tags:</strong></p>
                    <ul class="posts__tags">
                        <li v-for="tag in post.tags" :key="tag.id" class="posts__tag">
                            {{tag.name}}
                        </li>
                    </ul>
                </div>
                <router-link :to="{ name: 'single-post', params: { slug:post.slug } }">Visualizza post</router-link>
            </li>
        </ul>
  </div>
</template>

<script>
export default {
    name: "Posts",
    data() {
        return {
            posts: []
        }
    },
    created(){
        axios.get("/api/posts")
            .then((response)=> {
                this.posts = response.data;
            })
    }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

    .posts {

        margin: 1.25rem 0;

        &__list {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
        }

        &__card {
            width: calc(100% / 2 - 20px);
            padding: 2.5rem;
            border: 2px dotted $color-border;
            border-radius: 1.75rem;
            background-color: $background-light;
        }

        &__image {
            width: 100%;
            margin: 1.75rem 0;
            border-radius: .25rem;
            box-shadow: .25rem .25rem 1.5rem .125rem $shadow;
        }

        &__tags {
            display: flex;
        }

        &__tag {
            margin: .5rem .5rem .5rem 0;
            padding: .375rem .75rem;
            border: 1px solid $color-border;
            border-radius: 1.5rem;
        }
    }
</style>