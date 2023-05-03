<template>
    <h2 class="section-title">Articles</h2>
    <div>
        <form @submit.prevent="getPaginationData(1)">
            <div class="search-grp">
                <input v-model="search_global" type="text" name="search" id="search" placeholder="search...">
                <span @click="getPaginationData(1)">
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
    <Pagination :totalPages="total_pages"
                :perPage="per_page"
                :currentPage="current_page"
                @pagechanged="onPageChange"
    />
</template>

<script>
export default {
    name: 'Articles',
    data() {
        return {
            articles: {},
            isLoading: false,
            total_pages: 0,
            per_page: 0,
            current_page: 1,
            search_global: '',
        }
    },
    created() {
        // this.getPaginationData(this.current_page)
    },
    mounted() {
        this.getPaginationData(this.current_page)
        // this.getArticles(this.current_page)
    },
    methods: {
        getPaginationData(page) {
            if(this.isLoading) {return}
            this.isLoading = true

            axios.get('/api/articles?page=' + page)
                .then(response => {
                    this.total_pages = response.data.meta.last_page
                    this.per_page = response.data.meta.per_page
                    this.current_page = response.data.meta.current_page
                })
                .finally(() => {
                    this.isLoading = false
                    this.getArticles(page, this.search_global)
                })
        },
        getArticles(page, search_global) {
            if(this.isLoading) {return}
            this.isLoading = true

            axios.get('/api/articles?page=' + page +
                      '&search_global=' + search_global)
            .then(response => {
                this.articles = response.data.data
            })
            .catch(error => console.log(error))
            .finally(() => this.isLoading = false)
        },
        onPageChange(page) {
            this.current_page = page
            this.getPaginationData(page)
        }
    },
    watch: {
        search_global(current, previous) {
            // To show instant results while searching, uncomment the line below
            // this.getPaginationData(1)
        },
    },
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
