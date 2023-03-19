<template>
    <div>
        <form @submit.prevent="storeTags(tags)" ref="form">
            <!-- <div class="form-control">
                <VueMultiselect
                    v-model="tags"
                    :options="tagsList"
                    :multiple="true"
                    :close-on-select="true"
                    placeholder="Select tag"
                    label="name"
                    track-by="name"
                />
            </div> -->
            <div class="form-control">
                <label for="name">New tag(s)</label>
                <input v-model="tags.name" id="name" type="text" name="name" placeholder="Tag name(s) (use 'comma' separator for multiple tags)">
                <div v-for="message in validationErrors?.name" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <button :disabled="isLoading" type="submit" class="btn-primary btn-medium">
                <div v-show="isLoading" class="lds-dual-ring"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Save tag(s)</span>
            </button>
        </form>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <th>List of tags</th>
                <th></th>
                <th></th>
            </tr>
            <tr v-for="tag in tagsList">
                <td>{{ tag.name }}</td>
                <td><router-link :to="{ name: 'tag.edit', params: { name: tag.name } }">Edit</router-link></td>
                <td><a id="linkDelete" href="#" @click.prevent="deleteTag(tag.name)">Delete</a></td>
            </tr>
        </table>
    </div>
</template>

<script>
import { useRouter } from 'vue-router'
import { inject } from 'vue'

export default {
    name: 'Tags',
    data() {
        return {
            tags: {
                name: ''
            },
            tagsList: [],
            router: useRouter(),
            isLoading: false,
            validationErrors: '',
            swal: inject('$swal'),
        }
    },
    mounted() {
        this.getTags()
    },
    methods: {
        getTags() {
            axios.get('/api/tags')
            .then(response => this.tagsList = response.data.data)
            .catch(error => console.log(error))
        },
        storeTags(tags) {
            if(this.isLoading) {return}
            this.isLoading = true
            this.validationErrors = ''

            axios.post('api/tags', tags)
                .then(response => {
                    // this.swal({
                    //     icon: 'success',
                    //     title: 'Tag added.'
                    // })
                    this.$router.go(0)
                })
                .catch(error => {
                    if(error.response?.data) {
                        this.validationErrors = error.response.data.errors
                    }
                })
                .finally(() => this.isLoading = false)
        },
        deleteTag(tag) {
            if(this.isLoading) {return}
            // this.isLoading = true

            this.swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.isLoading = true
                    axios.delete('/api/tags/' + tag)
                        .then(response => {
                            this.router.push({ name: 'tags' })
                            // this.swal({
                            //     icon: 'success',
                            //     title: 'Tag deleted.'
                            // })
                            this.$router.go(0)

                        })
                        .catch(error => {
                            console.log(error)
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
        }
    }
}
</script>

<style scoped>
#linkDelete {
    color: var(--color-danger);
}
</style>
