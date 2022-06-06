import { createRouter, createWebHashHistory } from "vue-router";
import AllMarque from "./components/marque/Marque";
import AddMarque from "./components/marque/AddMaruqe";
import EditMarque from "./components/marque/EditMarque";
import AllCarroserie from "./components/carroserie/Carroserie";
import AddCarroserie from "./components/carroserie/AddCarroserie";
import EditCarroserie from "./components/carroserie/EditCarroserie";
import AllVoiteur from "./components/Voiteurs/Voiteurs";
import AddVoiteur from "./components/Voiteurs/AddVoiteur";
import EditVoiteur from "./components/Voiteurs/EditVoiteur";
import Register from "./components/Authentification/Register.vue";
import Login from "./components/Authentification/Login.vue";
import Profile from "./components/Authentification/Profile.vue";
import Logout from "./components/Authentification/Logout.vue";

import Home from "./Home";
const routes = [
    {
        name: "logout",
        path: "/logout",
        component: Logout,
    },
    {
        name: "register",
        path: "/register",
        component: Register,
    },
    {
        name: "login",
        path: "/login",
        component: Login,
    },
    {
        name: "profile",
        path: "/profile",
        component: Profile,
    },
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/editvoiteur",
        name: "editvoiteur",
        component: EditVoiteur,
    },
    {
        path: "/addvoiteur",
        name: "addvoiteur",
        component: AddVoiteur,
    },
    {
        path: "/voiteur",
        name: "voiteur",
        component: AllVoiteur,
    },
    {
        path: "/editcarrosie",
        name: "editcarroserie",
        component: EditCarroserie,
    },
    {
        path: "/carroserie",
        name: "carroserie",
        component: AllCarroserie,
    },
    {
        path: "/Addcarroserie",
        name: "addcarroserie",
        component: AddCarroserie,
    },
    {
        path: "/allmarque",
        name: "allmarque",
        component: AllMarque,
    },
    {
        path: "/addmarque",
        name: "addmarque",
        component: AddMarque,
    },
    {
        path: "/editmarque",
        name: "editmarque",
        component: EditMarque,
    },
];
const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

export default router;
