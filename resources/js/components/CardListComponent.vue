<template>
  <div class="row justify-content-around">
    <card-component
      :post="post"
      v-for="post in posts"
      :key="post.slug"
      :slug="post.slug"
    />
  </div>
</template>

<script>
import CardComponent from "./CardComponent.vue";
export default {
  components: { CardComponent },
  name: "CardListComponent",
  props: ["posts"],
};
</script>

<style>
</style>
