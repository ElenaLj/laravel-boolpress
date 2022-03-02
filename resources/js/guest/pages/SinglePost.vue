<template>
  <div class="single-post">
      <h2 class="single-post__title">{{post.title}}</h2>
      <img :src="`/storage/${post.image}`" :alt="post.title" class="single-post__image">
      <p class="single-post__text">{{post.content}}</p>

      <div class="single-post__comments">
          <h4>Lascia un commento</h4>
          <form @submit.prevent="addComment()">
              <div>
                <input type="text" id="name" name="name" placeholder="Inserisci il tuo nome" v-model="formData.name">
              </div>
              <div>
                <textarea id="comment" cols="30" rows="10" placeholder="Commenta... *" v-model="formData.content"></textarea>
                <div v-if="formErrors.content">
                    <ul>
                        <li v-for="(error, index) in formErrors.content" :key="index">
                            {{error }}
                        </li>
                    </ul>
                </div>
              </div>
              <div>
                  <button type="submit">Aggiungi commento</button>
              </div>
          </form>
          <div v-show="commentSent">
              Commento in fase di revisione. Grazie del contributo!
          </div>
      </div>

      <div>
          <h4>Comments</h4>
          <ul class="single-post__cmnt">
              <li v-for="comment in post.comments" :key="comment.id" class="single-post__comment">
                  <h5>{{comment.name}}</h5>
                  <p>{{comment.content}}</p>
              </li>
          </ul>
      </div>
  </div>
</template>

<script>
export default {
    name: "SinglePost",
    data() {
        return {
            post: {},
            formData: {
            name: "",
            content: "",
            post_id: null
            },
            commentSent: false,
            formErrors: {}
        }
    },
    methods: {
        addComment() {
            // backoffice request
            axios.post("/api/comments",this.formData)
                .then( (response) => {
                    this.formData.name = "";
                    this.formData.content = "";
                    this.commentSent = true;
            }).catch( (error) => {
                this.formErrors = error.response.data.errors;
            });
        }
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then( (response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
            }).catch( (error) => {
                this.$router.push({name: "page-404"});
            });
    }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

    .single-post {

        &__title {
            color: $color-dark;
            font-family: $font-secondary;
            text-align: center;
        }

        &__image {
            width: 50%;
            display: block;
            margin: 1.75rem auto;
            border-radius: .25rem;
            box-shadow: .25rem .25rem 1.5rem .125rem $shadow;
        }

        &__text {
            text-align: justify;
            line-height: 1.6;
        }

        &__comments {
            margin: 1rem 0;
        }

        input[type=text], textarea, &__cmnt {
            width: 50%;
            margin-bottom: 1rem;
            padding: 1rem 1rem;
            background-color: $background-secondary-light;
            border: none;
        }

        input:focus, textarea:focus {
            outline-color: $color-border;
        }

        button[type=submit] {
            padding: 1rem;
            color: $background-light;
            background-color: $color-border;
            border: none;
            border-radius: .375rem;
        }

        &__comment {
            margin: 1rem 0;
            padding: 1rem;
            background-color: $background-light;
            border-radius: .375rem;
        }
    }
</style>