<template>

      <div class="container">

          <div v-if='posts.length>0'>
              <card-list-component :posts='posts'/>
          </div>
          <div v-else> Caricamento in corso</div>
      </div>

</template>

<script>
import axios from 'axios';
import CardListComponent from '../components/CardListComponent.vue';
export default {
    name:'BlogComponent',
    components:{CardListComponent},
    data(){
         return{
            posts:[]
        }
    },
    mounted(){
        console.log('Mounted');
        window.axios.get('http://127.0.0.1:8000/api/posts')
        .then(({status, data}) => {
             console.log(data);
             if(status===200 && data.success){
                 this.posts=data.results;
             }
             })
        .catch(e => {
            console.log(e) });

    }


}
</script>

<style>

</style>
