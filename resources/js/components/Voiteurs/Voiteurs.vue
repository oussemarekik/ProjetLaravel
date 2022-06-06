<template>
 <div>
 <h2 class="text-center">Liste des Voiteur </h2>
 
 <table class="table" id="example">
 <thead>
 <tr>
 <th>nom</th> 
 <th>prix</th> 
 <th>caracterstique</th> 
 <th>garantie</th>
 <th>energie</th> 
 <th>boite</th> 
 <th>marque name</th> 
 <th>carrosseries name</th>
 <th>Image</th> 
 <th>Images</th> 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="p in Voiteur" :key="p.id">
 <td>{{p.nom}}</td> 
 <td>{{p.prix}}</td> 
 <td>{{p.caracterstique}}</td> 
 <td>{{p.garantie}}</td>
 <td>{{p.energie}}</td>
 <td>{{p.boite}}</td>
 <td>{{p.marques.name}}</td>
 <td>{{p.carrosseries.name}}</td>
 <td><img :src="p.image" :alt=p.designation  width="100"></td>
 <td><div v-for="pg in JSON.parse(p.imagepetit)" :key="pg"><img :src="pg" :alt=pg width="70"></div></td>
 <td>
 <button @click.prevent="deleteArticle(p.id)" class="btn 
btn-danger">Supprimer</button>
<router-link :to="{name: 'editvoiteur', params: { id: p.id 
}}" class="btn btn-success">Modifier</router-link>
</td>
 </tr>
 </tbody>
 </table>
 </div>
</template>
 
<script>
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css'; 
import 'jquery/dist/jquery.min.js'; 
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
 export default { 
 data() { 
 return { 
 Voiteur: [] 
 } 
 }, 
 mounted() { 
 this.getVoiteur(); 
 }, 
 methods: { 
 deleteArticle(id) { 
 if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) { 
 this.axios 
 .delete(`http://localhost:8000/api/voiteurneuf/${id}`) 
 .then(res => { 
 console.log(res) 
 this.getVoiteur(); 
 }) 
 .catch(error => { 
 console.log(error) 
 }); 
 } 
 }, 
 getVoiteur(){ 
 this.axios 
 .get('http://localhost:8000/api/voiteurneuf') 
 .then(response => { 
 this.Voiteur = response.data; 
 $(function() {$('#example').DataTable();}); 
 }); 
 } 
 } 
 } 
</script>