<template>
  <div class="container">
    <div
      v-if="categories.length > 0"
      class="
        row row-cols-2
        g-1
        align-items-center
        justify-content-around
        ct-h40vh
      "
    >
      <div v-for="(category, index) in categories" :key="index" class="col">
        <router-link
          :to="{ name: 'post-per-category', params: { id: category.id } }"
        >
          <div class="p-3 border text-center">
            {{ category.name }}
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CategoriesComponent",
  data() {
    return {
      categories: [],
    };
  },

  mounted() {
    this.loadPage("http://127.0.0.1:8000/api/categories");
  },
  methods: {
    loadPage(url) {
      window.axios
        .get(url)
        .then(({ status, data }) => {
          if (status === 200 && data.success) {
            console.log(data);
            this.categories = data.results;
          }
        })
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style lang='scss' scoped>
.ct-h40vh {
  min-height: 40vh;
}
.router-link-active {
  text-decoration: none;
  color: black;
}
</style>
