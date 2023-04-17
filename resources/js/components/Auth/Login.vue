<template>
    <div id="div-login-form" class="card card-form">
        <form @submit.prevent="submitLogin(credentials)" ref="form">
            <div class="form-control">
                <input v-model="credentials.email" type="text" name="email" placeholder="Email address">
                <div v-for="message in validationErrors?.email" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <div class="form-control">
                <input v-model="credentials.password" type="password" name="password" placeholder="Password">
                <div v-for="message in validationErrors?.password" class="txt-alert txt-danger">
                    <p>{{ message }}</p>
                </div>
            </div>
            <div class="form-control">
                <input type="checkbox" id="remember" name="remember" v-model="credentials.remember" />
                <span>Remember me</span>
            </div>
            <button :disabled="isLoading" type="submit" class="btn-primary btn-medium">
                <div v-show="isLoading" class="lds-dual-ring"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Login</span>
            </button>
        </form>
    </div>
</template>

<script>
import { useRouter } from 'vue-router'
import { inject, reactive } from 'vue'

export default {
    name: 'Login',
    data() {
        return {
            credentials: reactive({
                email: '',
                password: '',
                remember: false
            }),
            authenticate: (response) => {
                localStorage.setItem('loggedIn', JSON.stringify(true))
                localStorage.setItem('authToken', response.data.token)
                this.router.push({ name: 'articles.auth' })
            },
            router: useRouter(),
            isLoading: false,
            validationErrors: '',
            swal: inject('$swal'),
        }
    },
    mounted() {
        // console.log(this.isLoggedIn)
    },
    methods: {
        submitLogin(credentials) {
            if (this.isLoading) {return}
            this.isLoading = true
            this.validationErrors = {}

            axios.get('/sanctum/csrf-cookie').then(response => {
                // console.log(response.config.headers)
                // Login...
                axios.post('/login', credentials)
                    .then(response => {
                        this.authenticate(response)
                    })
                    .catch(error => {
                        if (error.response?.data) {
                            this.validationErrors = error.response.data.errors
                        }
                        if (error.response?.data.errors.credentials) {
                            this.swal({
                                icon: 'error',
                                title: error.response.data.errors.credentials,
                                text: error.response.data.message,
                            })
                        }
                    })
                    .finally(() => this.isLoading = false)
            });
        },
    },
    computed: {
        isLoggedIn() {
            return !!window.localStorage.getItem('loggedIn')
        }
    }
}
</script>

<style scoped>
#div-login-form.card-form {
    min-width: 220px;
    max-width: 400px;
    margin: 10px auto;
}

#remember {
    margin-right: 5px;
}
</style>
