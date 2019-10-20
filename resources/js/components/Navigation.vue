<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link :to="{name:'home'}" tag="a" class=navbar-brand>Laravel</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" v-if="!user.authenticated">
                    <!-- Authentication Links -->
                    <li class="nav-item">
                        <router-link tag="a" class="nav-link" :to="{name:'login'}">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link tag="a" class="nav-link" :to="{name:'register'}">Register</router-link>
                    </li>
                </ul>

                 <ul class="navbar-nav ml-auto" v-if="user.authenticated">
                    <li class="nav-item">
                        <router-link tag="a" class="nav-link" :to="{name:'timeline'}">Timeline</router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{user.data.name}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#" @click.prevent="signOut">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        computed: mapGetters({
            user:'auth/user'
        }),
        methods:{
            ...mapActions({
                logout:'auth/logout'
            }),
            signOut(){
                this.logout().then(()=>{
                    this.$router.replace({name:'login'});
                });
            }
        }
    }
</script>
