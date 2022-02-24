<template>
    <div class="posts">
        <h2>Latest posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                <h4>{{post.title}}</h4>
                <p v-if="post.category">Categoria :<strong>{{post.category.name}}</strong></p>
                <div v-if="post.tags.length > 0">
                    <p><strong>Tags:</strong></p>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.id">
                            {{tag.name}}
                        </li>
                    </ul>
                </div>
                <p>{{post.content}}</p>
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

<style>

</style>