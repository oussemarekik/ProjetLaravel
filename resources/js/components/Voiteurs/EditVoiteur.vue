<template lang="">
<form @submit.prevent="modifiervoiteur">
 
 <div class="form-group">
 <input type="text" class="form-control" placeholder="nom" v-model="voiteur.nom">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="prix" v-model="voiteur.prix">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="caracteristique" v-model="voiteur.caracteristique">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="garantie" v-model="voiteur.garantie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="energie" v-model="voiteur.energie">
 </div>
 <div class="form-group">
 <input type="text" class="form-control" placeholder="boite" v-model="voiteur.boite">
 </div>


 <div class="form-group">
 Marque<select class="form-control" v-model="voiteur.marqueId" >
 <option v-for="c in Marques" :key="c.id"  :value="c.id">{{c.name}}</option>
 </select> 
 </div>
 <div class="form-group">
 Carrosseries<select class="form-control" v-model="voiteur.carrosseriesId">
 <option v-for="sc in Carrosseries" :key="sc.id" :value="sc.id"> {{sc.name}} </option>
 </select> 
 </div>
 <div class="form-group">
 <FilePond max-files="1" @change="onFileChange" 
:files="voiteur.image" />
</div>
 <div class="form-group">
 <FilePond @change="onFileChangeM" :files="tab" @removefile
="onRemoveFileClick" />
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
 name: 'edit', 
 components: { 
 FilePond: vueFilePond(FilePondPluginImagePreview) 
 }, 
 data() { 
 return { 
 tab:[], 
 voiteur:{}, 
 Marques:[], 
 Carrosseries:[], 
 
 } 
 }, 
 methods: { 
 
 modifiervoiteur(){ 
 this.axios.patch(`http://localhost:8000/api/voiteurneuf/${this.$route.params.id}`,this.voiteur) 
 .then(() => { 
 this.$router.push('/voiteur')}) 
 .catch(error => { 
 this.errorMessage = error.message; 
 console.error("There was an error!", error);}) 
 }, 
 onFileChange(e) { 
 this.voiteur.image = 
'../storage/images/'+e.target.files[0].name; 
 
 }, 
 onFileChangeM (e) { 
 
 this.tab.push('../storage/images/'+e.target.files[0].name); 
 this.voiteur.imagepetit=JSON.stringify(this.tab); 
 }, 
 onRemoveFileClick(...e){ 
 let imag= '../storage/images/'+e[1].filename; 
 var index = this.tab.map((val)=> {return val }).indexOf(imag); 
 this.tab.splice(index,1); 
 this.voiteur.imagepetit=JSON.stringify(this.tab); 
 }, 
 
 getCategories(){ 
   this.axios.get("http://localhost:8000/api/carrosserie").then(res=>{this.Carrosseries=res.data}).catch(error=>{console.log(error)});
 this.axios.get('http://localhost:8000/api/marque').then(res =>
{ 
 this.Marques = res.data; 
 }).catch(error => { 
 console.log(error) 
 }); 
 }, 
 getOneArticle(){ 
 this.axios 
 .get(`http://localhost:8000/api/voiteurneuf/${this.$route.params.id}`) 
 .then((res) => { 
 this.voiteur = res.data; 
 this.tab= JSON.parse(this.voiteur.imagepetit); 
 console.log(res.data);
 }); 
 } 
 }, 
 created() { 
 this.getOneArticle() ; 
 this.getCategories(); 
 }, 
} 
</script>