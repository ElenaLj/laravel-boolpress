<template>
  <div class="single-post">
      <h2>{{post.title}}</h2>
      <img :src="`/storage/${post.image}`" :alt="post.title">
      <p>{{post.content}}</p>

      <div>
          <h4>Lascia un commento</h4>
          <form @submit.prevent="addComment()">
              <div>
                <input type="text" id="name" name="name" placeholder="Inserisci il tuo nome" v-model="formData.name">
                <label for="nome"></label>
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

<style>

</style>