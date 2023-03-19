<template>
    <form @submit.prevent="updateTag(tag)" ref="form">
        <div class="form-control">
            <input v-model="tag.name" type="text" name="name" placeholder="Tag name">
            <div v-for="message in validationErrors?.name" class="txt-alert txt-danger">
                <p>{{ message }}</p>
            </div>
        </div>
        <button :disabled="isLoading" type="submit" class="btn-primary btn-medium">
            <div v-show="isLoading" class="lds-dual-ring"></div>
            <span v-if="isLoading">Processing...</span>
            <span v-else>Update tag</span>
        </button>
    </form>
</template>

<script>
import { useRouter } from 'vue-router'

export default {
    name: 'TagEdit',
    data() {
        return {
            tag: {
                name: this.$route.params.name
            },
            router: useRouter(),
            validationErrors: '',
            isLoading: false,
        }
    },
    mounted() {
        this.getTag(this.$route.params.name)
    },
    methods: {
        getTag(name) {
            axios.get('/api/tags/'+name)
                .then(response => this.tag = response.data.data)
                .catch(error => console.log(error))
        },
        updateTag(tag) {
            if(this.isLoading) {return}
            this.isLoading = true
            this.validationErrors = ''

            axios.patch('/api/tags/'+tag.name, tag)
                .then(response => {
                    this.router.push({ name: 'tags' })
                })
                .catch(error => {
                    if(error.response?.data) {
                        this.validationErrors = error.response.data.errors
                    }
                })
                .finally(() => this.isLoading = false)
        }
    }
}
</script>
