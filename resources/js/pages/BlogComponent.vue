<template>
  <div class="container">
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
import axios from "axios";
import CardListComponent from "../components/CardListComponent.vue";
export default {
  name: "BlogComponent",
  components: { CardListComponent },
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: "",
      nextPage: "",
      prevPage: "",
    };
  },
  mounted() {
    this.loadPage("http://127.0.0.1:8000/api/posts");
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then(({ status, data }) => {
          if (status === 200 && data.success) {
            this.posts = data.results.data;
            this.currentPage = data.results.current_page;
            this.nextPage = data.results.next_page_url;
            this.prevPage = data.results.prev_page_url;
            this.lastPage = data.results.last_page;
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

<style lang='scss'>
.ct-pages {
  margin-top: 2vh;
  display: flex;
  width: 100%;
  justify-content: center;
  align-items: center;
  gap: 20px;
}
</style>
