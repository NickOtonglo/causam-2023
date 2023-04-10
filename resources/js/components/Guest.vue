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
                                    <span id="navMenuToggle">Hi, Administrator</span>
                                    <ul id="navMenu" class="navmenu-list">
                                        <li><a href="#">My account</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </template>
                        <template v-else>
                            <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
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
export default {
    mounted(){
        console.log(this.isLoggedIn)
        this.menuControl()
    },
    methods: {
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
