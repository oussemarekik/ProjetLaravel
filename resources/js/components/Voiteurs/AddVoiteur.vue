<template lang="">
<form @submit.prevent="ajouterproduit">
 
 <div class="form-group">
 <input type="text" class="form-control" placeholder="nom" v-model="nom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prix" v-model="prix">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="caracteristique" v-model="caracteristique">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="garantie" v-model="garantie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="energie" v-model="energie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="boite" v-model="boite">
 </div>


 <div class="form-group">
 Marque<select class="form-control" v-model="marqueId" >
 <option v-for="c in Marques" :key="c.id"  :value="c.id">{{c.name}}</option>
 </select> 
 </div>
 <div class="form-group">
 Carrosseries<select class="form-control" v-model="carrosseriesId">
 <option v-for="sc in Carrosseries" :key="sc.id" :value="sc.id"> {{sc.name}} </option>
 </select> 
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange"/>
</div>
 <div class="form-group">
 <FilePond ref="pond" @change="onFileChangeM" @removefile="onRemoveFileClick"/>
</div>
 <button type="submit" class="btn btn-block btn-primary">Ajouter 
Produit</button>
</form>
</template>
 
<script>
import vueFilePond from 'vue-filepond'; 
import 'filepond/dist/filepond.min.css'; 
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'; 
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'; 
 
export default { 
 name: 'app', 
 components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 }, 
 data() { 
 return { 
 tab:[], 
 id:"", 
 nom: "", 
 prix: "", 
 caracteristique: "", 
 garantie: "", 
 energie: "", 
 boite: "", 

 image: "", 
 imagepetit:[], 
 marqueId :"", 
 carrosseriesId:"", 
 Marques:[], 
 Carrosseries:[], 
 
 } 
 }, 
 methods: { 
 
 ajouterproduit(){ 
 const pr = { 
 nom:this.nom, 
 prix:this.prix, 
 caracterstique:this.caracteristique, 
 garantie:this.garantie, 
 energie:this.energie, 
 boite:this.boite, 
 image:this.image,
 
 marqueId :this.marqueId, 
 carrosseriesId :this.carrosseriesId , 
 imagepetit:this.imagepetit, 
 } 
 console.log(pr);
 this.axios.post("http://localhost:8000/api/voiteurneuf",pr) 
 .then(() => { 
 this.$router.push('/voiteur')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.image = 
'../storage/images/'+e.target.files[0].name; 
 
 }, 
 onFileChangeM (e) { 
 this.tab.push('../storage/images/'+e.target.files[0].name) 
 this.imagepetit=JSON.stringify(this.tab); 
 }, 
 onRemoveFileClick(...e){ 
 let imag= '../storage/images/'+e[1].filename; 
 var index = this.tab.map((val)=> {return val }).indexOf(imag); 
 console.log(index) 
 this.tab.splice(index,1); 
 this.imagepetit=JSON.stringify(this.tab); 
 }, 

 }, 
 created() { 
     this.axios.get("http://localhost:8000/api/carrosserie").then(res=>{this.Carrosseries=res.data}).catch(error=>{console.log(error)});
 this.axios.get('http://localhost:8000/api/marque').then(res =>
{ 
 this.Marques = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
} 
</script>
<style lang="">
 
</style>