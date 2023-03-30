<template>
    <div class="navbar">
        <div class="container">
            <h1><a href="/">causam</a></h1>
            <nav>
                <ul>
                    <template v-if="isLoggedIn">
                        <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
                        <li><router-link :to="{ name: 'article.create'}" href="/articles/new">New article</router-link></li>
                        <li><router-link :to="{ name: 'tags'}" href="/tags">Tags</router-link></li>
                    </template>
                    <template v-else>
                        <li><router-link :to="{ name: 'articles'}" href="/articles">All articles</router-link></li>
                    </template>
                </ul>
            </nav>
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
    name: 'Articles',
    data() {
        return {
            articles: [],
            isLoading: false,
        }
    },
    mounted() {
        this.getArticles()
    },
    methods: {
        getArticles() {
            if(this.isLoading) {return}
            this.isLoading = true

            axios.get('/api/articles')
            .then(response => this.articles = response.data.data)
            .catch(error => console.log(error))
            .finally(() => this.isLoading = false)
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
