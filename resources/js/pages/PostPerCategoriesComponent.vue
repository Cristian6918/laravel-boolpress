<template>
  <div class="container">
    <h1>{{ category.name }}</h1>
    <div v-if="posts.length > 0">
      <card-list-component :posts="posts" />
    </div>
    <div v-else>Caricamento in corso</div>
    <div class="ct-pages">
      <button
        @click="loadPrevPage()"
        class="btn btn-secondary"
        :disabled="currentPage <= 1"
      >
        Previous Page
      </button>
      <span>{{ currentPage }} / {{ lastPage }}</span>
      <button
        @click="loadNextPage()"
        class="btn btn-secondary"
        :disabled="currentPage === lastPage"
      >
        Next Page
      </button>
    </div>
  </div>
</template>

<script>
import CardListComponent from "../components/CardListComponent.vue";
export default {
  name: "PostPerCategories",
  components: { CardListComponent },
  data() {
    return {
      category: undefined,
      posts: undefined,
      currentPage: 1,
      lastPage: "",
      nextPage: "",
      prevPage: "",
    };
  },
  mounted() {
    const id = this.$route.params.id;
    window.axios
      .get("http://127.0.0.1:8000/api/categories/" + id)
      .then(({ status, data }) => {
        if (status === 200 && data.success) {
          console.log(data);
          this.category = data.category;
          this.posts = data.posts.data;
          console.log("category", this.category);
          console.log("posts", this.posts);
          this.currentPage = data.posts.current_page;
          this.nextPage = data.posts.next_page_url;
          this.prevPage = data.posts.prev_page_url;
          this.lastPage = data.posts.last_page;

          console.log("category", this.category);
        }
      })
      .catch((e) => {
        console.log(e);
      });
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then(({ status, data }) => {
          if (status === 200 && data.success) {
            this.category = data.category;
            this.posts = data.posts.data;
            this.currentPage = data.posts.current_page;
            this.nextPage = data.posts.next_page_url;
            this.prevPage = data.posts.prev_page_url;
            this.lastPage = data.posts.last_page;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
    loadNextPage() {
      this.loadPage(this.nextPage);
    },
    loadPrevPage() {
      this.loadPage(this.prevPage);
    },
  },
};
</script>

<style>
</style>
