<template>
    <h2 class="section-title">Articles</h2>
    <div>
        <form action="">
            <div class="search-grp">
                <input type="text" name="search" id="search">
                <span>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
            </div>
        </form>
    </div>
    <div id="isLoading">
        <div v-show="isLoading" class="lds-dual-ring"></div>
        <span v-if="isLoading">Loading...</span>
    </div>
    <div class="cards-flex">
        <div v-for="article in articles" class="card card-img-bg-txt card-clickable">
            <router-link :to="{ name: 'article.view', params: { slug: article.slug } }">
                <div class="img" :style="{ backgroundImage: `url(/storage/images/articles/${article.slug}/${article.thumbnail})` }"></div>
                <div class="text">
                    <h4>{{ article.title }}</h4>
                    <p>{{ article.preview }}</p>
                </div>
            </router-link>
        </div>
    </div>
    <template v-if="!articles.length">
        <p style="text-align: center;">-no articles-</p>
    </template>
</template>

<script>
export default {
    name: 'Articles',
    components: {
        'TailwindPagination': TailwindPagination,
    },
    data() {
        return {
            articles: {},
            isLoading: false,
        }
    },
    mounted() {
        this.getArticles()
    },
    methods: {
        getArticles(page = 1) {
            if(this.isLoading) {return}
            this.isLoading = true

            axios.get('/api/articles?page=' + page)
            .then(response => {
                this.articles = response.data.data
            })
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

#isLoading {
    display: flex;
    justify-content: center;
}

.result {
    display: flex;
    flex-direction: column;
    gap: 5px;
    font-weight: 300;
    width: 400px;
    padding: 10px;
    text-align: center;
    margin: 0 auto 10px auto;
    background: #eceef0;
    border-radius: 10px;
}
</style>
