<template>
    <template v-if="isAuthor()">
        <router-link class="btn btn-primary btn-medium"
            :to="{ name: 'article.edit', params: { slug: article.slug } }">Update</router-link>
        <button @click.prevent="deleteArticle(article.slug)" :disabled="isLoading" type="submit"
            class="btn-danger btn-medium">
            <div v-show="isLoading" class="lds-dual-ring"></div>
            <span v-if="isLoading">Processing...</span>
            <span v-else>Delete article</span>
        </button>
        <br><br>
    </template>
    <h1>{{ article.title }}</h1>
    <img :src="'/images/articles/' + article.slug + '/' + article.thumbnail">
    <br>
    <h3 v-if="article.author">by {{ article.author.name }}</h3>
    <p>Published on: {{ article.timestamp }}</p>
    <p>Tags:
        <template v-for="tag in tags">
            <span>
                <router-link :to="{ name: 'tag.articles', params: { name: tag.name } }" class="tag">{{ tag.name }}
                </router-link>
            </span>
        </template>
    </p>
    <hr>
    <br>
    <div id="content" v-html="article.content"></div>
</template>

<script>
import { useRoute, useRouter } from 'vue-router'
import { inject } from 'vue'

export default {
    name: 'View',
    data() {
        return {
            article: {
                title: '',
                slug: this.$route.params.slug,
                thumbnail: '',
                content: '',
                timestamp: '',
                author: {},
            },
            route: useRoute(),
            router: useRouter(),
            isLoading: false,
            swal: inject('$swal'),
            tags: {},
        }
    },
    created() {
        this.getArticle(this.$route.params.slug)
        this.getTags(this.$route.params.slug)
        this.getAuthor(this.$route.params.slug)
    },
    methods: {
        getTags(slug) {
            axios.get('/api/articles/'+slug+'/tags')
                .then(response => this.tags = response.data.data)
                .catch(error => console.log(error))
        },
        getArticle(slug) {
            axios.get('/api/articles/'+slug)
                .then(response => this.article = response.data.data)
                .catch(error => console.log(error))
        },
        getAuthor(slug) {
            axios.get('/api/articles/'+slug+'/author')
                .then(response => {
                    this.article.author = response.data.author
                })
                .catch(error => {
                    console.log(error)
                    this.article.author = 'Loading...'
                })
        },
        deleteArticle(slug) {
            if(this.isLoading) {return}
            // this.isLoading = true

            this.swal.fire({
                title: 'Are you sure?',
                text: "This post will be erased from the system.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.isLoading = true
                    axios.delete('/api/articles/' + slug)
                        .then(response => {
                            this.router.push({ name: 'articles' })
                            this.swal({
                                icon: 'success',
                                title: 'Article deleted.'
                            })
                        })
                        .catch(error => {
                            // console.log(error)
                            this.swal({
                                icon: 'error',
                                title: 'Something went wrong, please try again.'
                            })
                        })
                        .finally(() => this.isLoading = false)
                } else {
                    this.isLoading = false
                }
            })
        },
        isAuthor() {
            if(this.isLoggedIn && this.article.author.id == localStorage.getItem('user')) {
                // console.log('isAuthor() true')
                return true
            } else
            // console.log('isAuthor() false')
            return false
        }
    },
    computed: {
        isLoggedIn() {
            return !!window.localStorage.getItem('loggedIn')
        },
    }
}
</script>
