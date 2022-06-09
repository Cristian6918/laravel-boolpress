<template>

     <div class="card ct-card" style="width: 18rem;">
         <div class="card-body d-flex flex-column justify-content-between ">
            <h3 class="card-title">{{ post.title}}</h3>
            <img :src="'storage/'+post.cover" alt="post.slug" >
            <p class="card-text">{{post.content }}</p>
         </div>
    </div>

</template>

<script>
export default {
    name:'CardComponent',
    props:['post'],
    methods:{
         cover(string) {
             return `storage/${string}`;
        }
    }

}
</script>

<style lang='scss' scoped>
img{
    width:100%;
}

</style>
