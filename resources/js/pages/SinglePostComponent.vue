<template>
  <div class="container">
    <h1>{{ category.name }}</h1>
    <div class="card mb-4">
      <div class="card-header"></div>

      <img
        v-if="post.cover"
        :src="'/storage/' + post.cover"
        class="card-img-top"
        :alt="post.slug"
      />

      <div class="card-body">
        <h3 class="card-title">{{ post.title }}</h3>
        <p class="card-text">{{ post.content }}</p>
        <div class="post-tags d-flex justify-content-start">
          <span v-for="(tag, index) in post.tags" :key="index">{{
            tag.name
          }}</span>
        </div>
        <router-link class="btn btn-primary" :to="{ name: 'blog' }">
          <i class="fa-solid fa-arrow-left"></i> Back
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePostComponent",
  data() {
    return {
      post: {},
      category: {},
    };
  },
  mounted() {
    const slug = this.$route.params.slug;

    window.axios
      .get("http://127.0.0.1:8000/api/posts/" + slug)
      .then(({ status, data }) => {
        console.log(data);
        if (status === 200 && data.success) {
          this.post = data.results;
          this.category = this.post.category;
        }
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>

<style>
</style>
