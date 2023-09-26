<template>
    <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
    <li><router-link :to="{ name: 'article.create'}" href="/articles/new">New article</router-link></li>
    <li><router-link :to="{ name: 'tags'}" href="/tags">Tags</router-link></li>
    <li>
        <div class="navmenu">
            <span id="navMenuToggle">Hi, {{ user.name }}</span>
            <ul id="navMenu" class="navmenu-list">
                <li><router-link :to="{name: 'user.account'}">My account</router-link></li>
                <li @click="logout" :disabled="isLoading">
                    <a href="#">
                        <template v-if="isLoading">Logging out...</template>
                        <template v-else>Logout</template>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</template>

<script>
import { reactive, inject } from 'vue'
import { useRouter } from 'vue-router'

export default {
    name: 'Authenticated',
    data() {
        return {
            user: reactive({
                name: '',
                email: '',
            }),
            router: useRouter(),
            isLoading: false,
            swal: inject('$swal'),
        }
    },
    mounted() {
        this.getUser()
        this.menuControl()
    },
    methods: {
        getUser() {
            axios.get('/api/user')
                .then(response => {
                    this.user.name = response.data.name
                    this.user.email = response.data.email
                })
                .catch(error => {
                    if (error.response?.data) {
                        this.swal({
                            icon: 'error',
                            title: error.response?.status,
                            text: error.response?.statusText
                        })
                    }
                })
        },
        logout() {
            // console.log('logout() - auth')
            if (this.isLoading) return
            this.isLoading = true

            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('loggedIn')
                    localStorage.removeItem('authToken')
                    localStorage.removeItem('user')
                    this.$router.go()
                })
                .catch(error => console.log(error.response))
                // .finally(this.router.push({ name: 'auth.login' }))
        },
        menuControl() {
            let navMenuToggle, navMenu, navMenuItem

            if (document.querySelector('#navMenuToggle')) {
                navMenuToggle = document.querySelector('#navMenuToggle')
                navMenuToggle.addEventListener('click', () => {
                    this.toggleMenu(navMenu)
                })
            }

            if (document.querySelector('#navMenu')) {
                navMenu = document.querySelector('#navMenu')
            }

            if (document.querySelectorAll('#navMenu li')) {
                navMenuItem = document.querySelectorAll('#navMenu li')
                navMenuItem.forEach(i => i.addEventListener('click', () => {
                    this.closeMenu(navMenu)
                }))
            }
        },
        toggleMenu(navMenu) {
            if (window.getComputedStyle(navMenu).display === 'none') {
                this.openMenu(navMenu)
            } else if (window.getComputedStyle(navMenu).display !== 'none') {
                this.closeMenu(navMenu)
            }
        },
        closeMenu(navMenu) {
            navMenu.style.display = 'none'
        },
        openMenu(navMenu) {
            navMenu.style.display = 'unset'
        }
    },
    computed: {
        isLoggedIn() {
            return !!window.localStorage.getItem('loggedIn')
        }
    }
}
</script>

<style scoped>
.lds-dual-ring:after {
    border: 4px solid var(--color-primary);
    border-color: var(--color-primary) transparent var(--color-primary) transparent;
}
</style>
