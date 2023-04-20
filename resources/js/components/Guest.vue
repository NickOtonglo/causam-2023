<template>
    <div class="navbar">
        <div class="nav-wrapper">
            <div class="container">
                <h1><a href="/">causam</a></h1>
                <nav>
                    <ul>
                        <template v-if="isLoggedIn">
                            <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
                            <li><router-link :to="{ name: 'article.create'}" href="/articles/new">New article</router-link></li>
                            <li><router-link :to="{ name: 'tags'}" href="/tags">Tags</router-link></li>
                            <li>
                                <div class="navmenu">
                                    <span id="navMenuToggle">Hi, {{ user.name }}</span>
                                    <ul id="navMenu" class="navmenu-list">
                                        <li><a href="#">My account</a></li>
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
                        <template v-else>
                            <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
                        </template>
                        <!-- <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li> -->
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
import { reactive, inject } from 'vue'
import { useRouter } from 'vue-router'

export default {
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
    mounted(){
        if (this.isLoggedIn) {
            this.getUser()
        }
        this.menuControl()
    },
    created() {
        // axios.interceptors.response.use(
        //     response => {
        //         return response
        //     },
        //     error => {
        //         if (error.response.status === 401 || error.response.status === 419) {
        //             this.logout()
        //         }

        //         return Promise.reject(error)
        //     }
        // )
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
            if (this.isLoading) return
            this.isLoading = true

            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('loggedIn')
                    localStorage.removeItem('authToken')
                    localStorage.removeItem('user')

                })
                .catch(error => console.log(error.response))
                .finally(this.router.push({ name: 'auth.login' }))
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
