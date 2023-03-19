<template>
    <h2 class="section-title">Articles</h2>
    <div class="cards-flex">
        <div>
            <div v-show="isLoading" class="lds-dual-ring"></div>
            <span v-if="isLoading">Loading...</span>
        </div>
        <div v-for="article in articles" class="card card-img-bg-txt card-clickable">
            <router-link :to="{ name: 'article.view', params: { slug: article.slug } }">
                <div class="img" :style="{ backgroundImage: `url(/storage/images/articles/${article.slug}/${article.thumbnail})` }"></div>
                <div class="text">
                    <h4>{{ article.title }}</h4>
                    <p>{{ article.preview }}</p>
                </div>
            </router-link>
        </div>
        <template v-if="!articles.length">
            <p>-no articles-</p>
        </template>
    </div>
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
    }
}
</script>

<style scoped>
.lds-dual-ring:after {
    border: 4px solid var(--color-primary);
    border-color: var(--color-primary) transparent var(--color-primary) transparent;
}
</style>
