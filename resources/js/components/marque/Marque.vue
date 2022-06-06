<template>
 <div>
 
 <h2 class="text-center">Liste des Marque</h2>
 
 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Maruqe</th> 
 <th>Image</th> 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="cat in Marque" :key="cat.id">
 <td>{{cat.name}}</td> 
 <td><img :src="'/storage/images/'+cat.imagemarque" :alt="cat.imagemarque" width="70"></td>
 <td>
 <button @click.prevent="deleteCategorie(cat.id)" 
class="btn btn-danger">Delete</button>
<router-link :to="{name: 'editmarque', params: { id: cat.id }}" class="btn btn-success">Modifier </router-link>
</td>
 </tr>
 </tbody>
 </table>
 </div>
</template>
 
<script>
import 'bootstrap/dist/css/bootstrap.min.css'; 
import 'jquery/dist/jquery.min.js'; 
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from 'jquery'; 
 export default { 
 data() { 
 return { 
 Marque: [] 
 } 
 }, 
 mounted() { 
 this.getMarque(); 
 }, 
 methods: { 
 deleteCategorie(id) { 
     console.log("hiii");
 this.axios 
 .delete(`http://localhost:8000/api/marque/${id}`) 
 .then(res => { 
 console.log(res) 
 this.getMarque(); 
 }) 
 .catch(error => { 
 console.log(error) 
 }); 
 }, 
 getMarque(){ 
 this.axios 
 .get('http://localhost:8000/api/marque') 
 .then(response => { 
 this.Marque = response.data;
  
 $(function() {$('#example').DataTable();});
 }); 
 } 
 } 
 } 
</script>