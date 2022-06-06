<template>

<div v-if="token.length>0"><Menu /> </div>
 <div v-else>
 <nav class="navbar navbar-dark bg-dark">
 <a class="navbar-brand float-left">
 <router-link class="nav-link" to="/register"> Authentification 
</router-link>
 </a>
 </nav> 
 </div>
    <router-view> </router-view>

</template>

 
<script>
import Menu from './Menu'
 export default { 
 components: { 
 Menu 
 } ,data (){ 
 return { 
 token : ""
 } 
 }, 
 created(){ 
 if ((localStorage.getItem('user'))) { 
 let user = JSON.parse(localStorage.getItem('user')); 
 console.log("token",user) 
 this.token=user.token; 
 
 } 
 
 } 
 } 
 </script>