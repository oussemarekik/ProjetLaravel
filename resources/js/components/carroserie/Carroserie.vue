<template>
 <div>
 
 <h2 class="text-center">Liste des Carroserie</h2>
 
 <table class="table" id="example">
 <thead>
 <tr>
 <th>Nom Maruqe</th> 
 <th>Image</th> 
 <th>Actions</th>
 </tr>
 </thead>
 <tbody>
 <tr v-for="cat in Carroserie" :key="cat.id">
 <td>{{cat.name}}</td> 
 <td><img :src="'/storage/images/'+cat.imagecarrosseries" :alt="cat.imagecarrosseries" width="70"></td>
 <td>
 <button @click.prevent="deleteCarroserie(cat.id)" class="btn btn-danger">Delete</button>
 <router-link :to="{name: 'editcarroserie', params: { id: cat.id }}" class="btn btn-success">Modifier </router-link>

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
 Carroserie: [] 
 } 
 }, 
 mounted() { 
 this.getCarroserie(); 
 }, 
 methods: { 
 deleteCarroserie(id) { 
     console.log("hiii");
 this.axios 
 .delete(`http://localhost:8000/api/carrosserie/${id}`) 
 .then(res => { 
 console.log(res) 
 this.getCarroserie(); 
 }) 
 .catch(error => { 
 console.log(error) 
 }); 
 }, 
 getCarroserie(){ 
 this.axios 
 .get('http://localhost:8000/api/carrosserie') 
 .then(response => { 
 this.Carroserie = response.data; 
 console.log(this.Carroserie);
 $(function() {$('#example').DataTable();});
 }); 
 } 
 } 
 } 
</script>