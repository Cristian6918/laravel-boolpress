<template>
  <header>
    <nav>
      <ul class="navbar nav justify-content-around">
        <li
          v-for="(item, index) in menu"
          :key="index"
          class="nav-item ct-header-item"
        >
          <router-link :to="{ name: item.linkName }">{{
            item.label
          }}</router-link>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "HomeComponent",
  data() {
    return {
      menu: [
        { linkName: "home", label: "Home" },
        { linkName: "blog", label: "My Posts" },
        { linkName: "about-us", label: "About Us" },
        { linkName: "categories", label: "Categories" },
        { linkName: "contacts", label: "Contacts" },
      ],
    };
  },
};
</script>

<style lang='scss' scoped>
@import "../../sass/_variables.scss";
.ct-header-item {
  padding: 10px;
  border-bottom: 2px solid rgba(0, 0, 0, 0);
  text-decoration: none;
  a:hover {
    text-decoration: none;
  }
  &:hover {
    border-bottom: 2px solid $blue;
  }
}
</style>
