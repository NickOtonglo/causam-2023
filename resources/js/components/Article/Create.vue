<template>
    <form @submit.prevent="storeArticle(article, tags)" ref="form">
        <div class="form-control">
            <input v-model="article.title" type="text" name="title" placeholder="Title">
            <div v-for="message in validationErrors?.title" class="txt-alert txt-danger">
                <p>{{ message }}</p>
            </div>
        </div>
        <div class="form-control">
            <input @change="setThumbnail" type="file" name="thumbnail" ref="thumbnail" id="thumbnail">
            <button class="btn-medium"
                @click="triggerFileInput"
                type="button">
                Select thumbnail
            </button>
            <br>
            <img src="" alt="" ref="thumbHolder" id="thumbHolder">
            <div v-for="message in validationErrors?.thumbnail" class="txt-alert txt-danger">
                <p>{{ message }}</p>
            </div>
        </div>
        <QuillEditor
            v-model="quillContent"
            toolbar="full"
            ref="quillEditor"
            style="min-height: 400px;"
        />
        <div v-for="message in validationErrors?.preview" class="txt-alert txt-danger">
            <p>{{ message }}</p>
        </div>
        <div class="form-control">
            <VueMultiselect
                v-model="tags"
                :options="tagsList"
                :multiple="true"
                :close-on-select="true"
                placeholder="Select tag(s)"
                label="name"
                track-by="name"
            />
        </div>
        <br>
        <button type="button" class="btn-primary-outline btn-medium">Preview</button>
        <button :disabled="isLoading" type="submit" class="btn-primary btn-medium">
            <div v-show="isLoading" class="lds-dual-ring"></div>
            <span v-if="isLoading">Processing...</span>
            <span v-else>Publish article</span>
        </button>
    </form>
    <div id="content" style="padding: 10px"></div>
</template>

<script>
import { useRouter } from 'vue-router'
import { inject } from 'vue'
import VueMultiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.css'

export default {
    name: 'ArticleCreate',
    components: {
        VueMultiselect
    },
    data() {
        return {
            quillContent: '',
            readOnly: true,
            delta: undefined,
            article: {
                title: '',
                preview: '',
                content: '',
                thumbnail: ''
            },
            router: useRouter(),
            validationErrors: '',
            isLoading: false,
            swal: inject('$swal'),
            tags: '',
            tagsList: [],
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
        storeArticle(article, tags) {
            if(this.isLoading) {return}
            this.isLoading = true
            this.validationErrors = ''
            article.content = this.$refs.quillEditor.getHTML()
            article.preview = this.$refs.quillEditor.getContents().ops[0].insert

            let serialisedPost = new FormData()
            for (let item in article) {
                if (article.hasOwnProperty(item)) {
                    serialisedPost.append(item, article[item])
                }
            }

            let tagsFinal = []
            for (let item in tags) {
                if (tags.hasOwnProperty(item)) {
                    tagsFinal.push(tags[item].name)
                }
            }

            serialisedPost.append('tags', tagsFinal)

            axios.post('/api/articles', serialisedPost)
                .then(response => {
                    this.router.push({ name: 'articles' })
                    this.swal({
                        icon: 'success',
                        title: 'Article published.'
                    })
                })
                .catch(error => {
                    if(error.response?.data) {
                        this.validationErrors = error.response.data.errors
                    }
                })
                .finally(() => this.isLoading = false)

            // get Quill content:
            // let content = this.$refs.quillEditor.getHTML()
        },
        triggerFileInput() {
            this.$refs.thumbnail.click()
        },
        setThumbnail(event) {
            // get image data from <input> and set src in <img>
            var selectedFile = event.target.files[0]
            var reader = new FileReader()

            var thumbHolder = this.$refs.thumbHolder

            reader.onload = function (event) {
                thumbHolder.src = event.target.result
            }

            reader.readAsDataURL(selectedFile)
            this.article.thumbnail = selectedFile
        }
    },
    watch: {
        // quillContent(val) {
        //     this.delta = this.$refs.quillEditor.quill.getContents()
        // }
    }
}
</script>

<style>
button {
    margin: 5px;
}

#thumbnail {
    display: none;
}

#thumbHolder {
    max-width: 200px;
}
</style>
