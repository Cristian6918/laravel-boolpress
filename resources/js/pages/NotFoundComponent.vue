<template>
  <div>
      <div class="container">
          <div class="row">
              <div class="col-12 text-center">Page Not Found</div>
          </div>
          <div class="col-12 text-center">
              <router-link :to="{name:'home'}"> </router-link>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name:'NotFoundComponent'

}
</script>

<style>

</style>
