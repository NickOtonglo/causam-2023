<template>
    <div class="navbar">
        <div class="nav-wrapper">
            <div class="container">
                <h1><a href="/">causam</a></h1>
                <nav>
                    <ul>
                        <template v-if="isLoggedIn">
                            <Authenticated />
                        </template>
                        <template v-else>
                            <Guest />
                        </template>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <router-view></router-view>
        </div>
    </section>
</template>

<script>
import { useRouter } from 'vue-router'
import Authenticated from './NavMenu/Authenticated'
import Guest from './NavMenu/Guest'

export default {
    name: 'App',
    components: {
        Authenticated,
        Guest
    },
    data() {
        return {
            router: useRouter(),
        }
    },
    created() {
        
    },
    mounted() {
        
    },
    computed: {
        isLoggedIn() {
            return !!window.localStorage.getItem('loggedIn')
        }
    }
}
</script>
