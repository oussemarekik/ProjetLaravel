<template lang="">
 
<form @submit.prevent="ajouterCategorie">
 <div class="form-group">
 <input type="text" class="form-control" placeholder="Nom" v-model="name">
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 
 <button type="submit" class="btn btn-block btn-primary">Ajouter 
Carroserie</button>
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
 name: "", 
 imagecarroserie: "", 
 } 
 }, 
 methods: { 
 
 ajouterCategorie(){ 
 const categ = { 
 name:this.name, 
 imagecarrosseries:this.imagecarrosseries 
 } 
 this.axios.post("http://localhost:8000/api/carrosserie",categ) 
 .then(() => { 
 this.$router.push('/carroserie')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.imagecarrosseries = "carroserie/"+e.target.files[0].name; 
 } 
 } 
} 
</script>
<style lang="">
 
</style>

