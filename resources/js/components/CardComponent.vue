<template>
  <div class="card ct-card" style="width: 18rem">
    <div class="card-body d-flex flex-column justify-content-between">
      <h3 class="card-title">{{ post.title }}</h3>
      <img v-if="post.cover" :src="'/storage/' + post.cover" alt="post.slug" />
      <p class="card-text">{{ post.content }}</p>
    </div>
    <router-link
      class="btn btn-primary"
      :to="{ name: 'single-post', params: { slug } }"
    >
      <i class="fa-regular fa-eye"></i>Visualizza
    </router-link>
  </div>
</template>

<script>
export default {
  name: "CardComponent",
  props: ["post", "slug"],
  methods: {
    cover(string) {
      return `storage/${string}`;
    },
  },
};
</script>

<style lang='scss' scoped>
img {
  width: 100%;
}
</style>
