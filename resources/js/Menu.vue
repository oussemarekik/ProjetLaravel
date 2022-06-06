<template>
 <!-- Nav bar -->
 <nav class="navbar navbar-dark bg-dark justify-content-between flex-nowrap 
flex-row">
    <div class="container">
    <a class="navbar-brand float-left">
    <router-link class="nav-link navbar-brand pr-3" to="/register">
    Authentification 
    </router-link>
    </a>
            <ul class="nav navbar-nav flex-row float-right">
            <li class="nav-item">
            <router-link class="nav-link navbar-brand pr-3" to="/"> Home </router-link>
            </li>
            <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/allmarque"> Marque </router-link>
                </li>
                <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/addmarque"> Add Marque </router-link>
                </li>
                  <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/carroserie"> Carroserie </router-link>
                </li>
                  <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/Addcarroserie"> Add Carroserie </router-link>
                </li>
                  <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/voiteur"> Voiteur </router-link>
                </li>
                  <li class="nav-item">
            <router-link class="nav-link  navbar-brand pr-3" to="/addvoiteur"> Add Voiteur </router-link>
                </li>
            <a class="navbar-brand float-left">
 <router-link class="nav-link" to="/logout"> Logout </router-link>
 </a>

        </ul>
    </div>
 </nav>
</template>
 
<script>
 export default {} 
</script>
