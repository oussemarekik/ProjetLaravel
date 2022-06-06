<template lang="">
 
<form @submit.prevent="modifiermarque">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="marque.name">
 </div>
 <div class="form-group">
<FilePond max-files="1" @change="onFileChange"  :files="'../storage/images/'+marque.imagecarrosseries" />
</div>
 
 <button type="submit" class="btn btn-block btn-primary">Modifier 
Marque</button>
</form>
</template>
<script>
import vueFilePond from 'vue-filepond'; 
import 'filepond/dist/filepond.min.css'; 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
export default { 
       components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 },
 data() { 
 return { 
 marque:[] 
 } 
 }, 
 mounted (){ 
 this.getOnemarque() ; 
 }, 
 methods: { 
 
 modifiermarque(){ 
 const categ = { 
 name:this.marque.name, 
 imagecarrosseries:this.marque.imagecarrosseries 
 } 
 console.log(categ);
 this.axios.put(`http://localhost:8000/api/carrosserie/${this.$route.params.id}`,categ) 
 .then(() => { 
 this.$router.push('/carroserie')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.marque.imagecarrosseries = "carroserie/"+e.target.files[0].name; 
 }, 
 getOnemarque(){ 
 this.axios 
 .get(`http://localhost:8000/api/carrosserie/${this.$route.params.id}`) 
 .then((res) => { 
 this.marque = res.data; 
 }); 
 } 
 } 
} 
</script>